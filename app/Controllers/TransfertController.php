<?php

namespace App\Controllers;
use App\Controllers\BaseController;
use App\Models\ClientModel;
use App\Models\SoldeModel;
use App\Models\TransactionModel;
use App\Models\BaremeFraisModel;
use App\Models\TypeOperationsModel;
use App\Models\CommissionsExterneModel;
use App\Models\PrefixesModel;
use App\Models\OperateurModel;

class TransfertController extends BaseController {
    
    public function faireTransfert() {
        if (!session()->get('user_id')) {
            return redirect()->to('/login');
        }
        return view('faireTransfert');
    }

    public function traiterTransfert() {
        if (!session()->get('user_id')) {
            return redirect()->to('/login');
        }

        $userId = session()->get('user_id');
        $montantTotal = $this->request->getPost('montant');
        $inclureFrais = $this->request->getPost('inclure_frais');
        $destinatairesInput = $this->request->getPost('destinataire');

        $destinataires = $this->preparerDestinataires($destinatairesInput);
        if (empty($destinataires)) {
            return redirect()->to('/faireTransfert')->with('error', 'Veuillez renseigner au moins un destinataire.');
        }

        $nbDestinataires = count($destinataires);
        $montantParDestinataire = $montantTotal / $nbDestinataires;

        $clientModel = new ClientModel();
        $typeOpModel = new TypeOperationsModel();
        $baremeFraisModel = new BaremeFraisModel();
        $soldeModel = new SoldeModel();
        $transactionModel = new TransactionModel();
        $prefixesModel = new PrefixesModel();
        $operateurModel = new OperateurModel();
        $commissionsExterneModel = new CommissionsExterneModel();

        $typeOpTransfert = $typeOpModel->where('code', 'transfert')->first();
        $typeOpRetrait = $typeOpModel->where('code', 'retrait')->first();
        
        $commissionExterneInfo = $commissionsExterneModel->first();
        $pourcentageExterne = $commissionExterneInfo ? $commissionExterneInfo['pourcentage'] : 0;

        $allPrefixes = $prefixesModel->findAll();
        $allOperateurs = $operateurModel->findAll();
        $operateursById = [];
        foreach($allOperateurs as $op) {
            $operateursById[$op['id']] = $op;
        }

        $totalCoutOperation = 0;
        $operationsPretes = [];

        $senderUser = $clientModel->where('id', $userId)->first();
        $senderOpInfo = $this->getOperateurInfo($senderUser['numero_telephone'], $allPrefixes, $operateursById);
        $isSenderLocal = $senderOpInfo['isLocal'];

        foreach ($destinataires as $destNumero) {
            $destClient = $this->getOrCreateClient($destNumero, $clientModel, $soldeModel);
            $opInfo = $this->getOperateurInfo($destNumero, $allPrefixes, $operateursById);

            if ($nbDestinataires > 1 && !$opInfo['isLocal']) {
                return redirect()->to('/faireTransfert')->with('error', "L'envoi multiple est autorisé uniquement vers notre opérateur. $destNumero est un numéro externe.");
            }

            $coutDetails = $this->calculerCoutsDestinataire(
                $montantParDestinataire, 
                $isSenderLocal,
                $opInfo['isLocal'], 
                $inclureFrais, 
                $pourcentageExterne, 
                $typeOpTransfert['id'], 
                $typeOpRetrait['id'], 
                $baremeFraisModel
            );

            $totalCoutOperation += $coutDetails['coutTotal'];

            $operationsPretes[] = [
                'dest_id' => $destClient['id'],
                'montantAEnvoyer' => $coutDetails['montantAEnvoyer'],
                'fraisTransfert' => $coutDetails['fraisTransfert'],
                'fraisExterne' => $coutDetails['fraisExterne'],
                'operateurDestId' => $opInfo['id']
            ];
        }

        $soldeEnvoyeur = $soldeModel->getSoldeByUserId($userId);
        if (!$soldeEnvoyeur || $soldeEnvoyeur['montant'] < $totalCoutOperation) {
            return redirect()->to('/faireTransfert')->with('error', 'Solde insuffisant. Le coût total de l\'opération est de ' . number_format($totalCoutOperation, 2, ',', ' ') . ' Ar.');
        }

        $this->executerTransactions($userId, $totalCoutOperation, $operationsPretes, $soldeModel, $transactionModel, $typeOpTransfert['id']);

        return redirect()->to('/voirSolde');
    }

    private function preparerDestinataires($destinatairesInput) {
        if (!is_array($destinatairesInput)) {
            $destinatairesInput = [$destinatairesInput];
        }
        return array_filter(array_map('trim', $destinatairesInput));
    }

    private function getOrCreateClient($numero, $clientModel, $soldeModel) {
        $client = $clientModel->getClientByNumeroTelephone($numero);
        if (!$client) {
            $clientModel->createClient(['numero_telephone' => $numero]);
            $client = $clientModel->getClientByNumeroTelephone($numero);
            $soldeModel->createSolde($client['id'], 0);
        }
        return $client;
    }

    private function getOperateurInfo($numero, $allPrefixes, $operateursById) {
        $operateurId = null;
        $isLocal = true;
        foreach ($allPrefixes as $p) {
            if (str_starts_with($numero, $p['prefixes'])) {
                $operateurId = $p['operateur_id'];
                $opInfo = $operateursById[$operateurId] ?? null;
                if ($opInfo) {
                    $isLocal = ($opInfo['is_local'] == 1);
                }
                break;
            }
        }
        return ['id' => $operateurId, 'isLocal' => $isLocal];
    }

    private function calculerCoutsDestinataire($montantParDestinataire, $isSenderLocal, $isReceiverLocal, $inclureFrais, $pourcentageExterne, $typeOpTransfertId, $typeOpRetraitId, $baremeFraisModel) {
        $fraisRetrait = 0;
        $fraisExterne = 0;
        $montantAEnvoyer = $montantParDestinataire;

        if ($isReceiverLocal && $inclureFrais) {
            $fraisRetrait = $this->trouverFraisDansBareme($montantParDestinataire, $typeOpRetraitId, $baremeFraisModel);
            $montantAEnvoyer += $fraisRetrait;
        }

        // Si l'expéditeur est local et le destinataire externe (Dette)
        if ($isSenderLocal && !$isReceiverLocal) {
            $fraisExterne = ($montantParDestinataire * $pourcentageExterne) / 100;
        }
        // Si l'expéditeur est externe et le destinataire local (Gain)
        else if (!$isSenderLocal && $isReceiverLocal) {
            $fraisExterne = ($montantParDestinataire * $pourcentageExterne) / 100;
        }

        $fraisTransfert = $this->trouverFraisDansBareme($montantAEnvoyer, $typeOpTransfertId, $baremeFraisModel);

        return [
            'montantAEnvoyer' => $montantAEnvoyer,
            'fraisTransfert' => $fraisTransfert,
            'fraisExterne' => $fraisExterne > 0 ? $fraisExterne : null,
            'coutTotal' => $montantAEnvoyer + $fraisTransfert + $fraisExterne
        ];
    }

    private function trouverFraisDansBareme($montant, $typeOpId, $baremeFraisModel) {
        $baremes = $baremeFraisModel->where('type_operation_id', $typeOpId)->findAll();
        foreach ($baremes as $bareme) {
            if ($montant >= $bareme['montant_min'] && $montant <= $bareme['montant_max']) {
                return $bareme['frais'];
            }
        }
        return 0;
    }

    private function executerTransactions($userId, $totalCoutOperation, $operationsPretes, $soldeModel, $transactionModel, $typeOpTransfertId) {
        $soldeEnvoyeur = $soldeModel->getSoldeByUserId($userId);
        $soldeModel->updateSolde($userId, $soldeEnvoyeur['montant'] - $totalCoutOperation);

        foreach ($operationsPretes as $op) {
            $soldeDest = $soldeModel->getSoldeByUserId($op['dest_id']);
            if ($soldeDest) {
                $soldeModel->updateSolde($op['dest_id'], $soldeDest['montant'] + $op['montantAEnvoyer']);
            } else {
                $soldeModel->createSolde($op['dest_id'], $op['montantAEnvoyer']);
            }

            $transactionModel->insertTransaction([
                'user_id' => $userId,
                'type_operation_id' => $typeOpTransfertId,
                'montant' => $op['montantAEnvoyer'],
                'frais' => $op['fraisTransfert'],
                'frais_externe' => $op['fraisExterne'],
                'operateur_destinataire_id' => $op['operateurDestId']
            ]);
        }
    }
}
