<?php

namespace App\Controllers;
use App\Controllers\BaseController;
use App\Models\ClientModel;
use App\Models\SoldeModel;
use App\Models\TransactionModel;
use App\Models\BaremeFraisModel;
use App\Models\TypeOperationsModel;

class ClientsController extends BaseController {
    public function index() {
        return view('login');
    }

    public function login() {
        $numeroTelephone = $this->request->getPost('numero_telephone');
        $clientModel = new ClientModel();
        $client = $clientModel->getClientByNumeroTelephone($numeroTelephone);

        if (!$client) {
            $clientModel->createClient(['numero_telephone' => $numeroTelephone]);
            $client = $clientModel->getClientByNumeroTelephone($numeroTelephone);
            $soldeModel = new SoldeModel();
            $soldeModel->createSolde($client['id'], 0);
        }

        session()->set('user_id', $client['id']);
        session()->set('numero_telephone', $client['numero_telephone']);

        return redirect()->to('/espaceClient');
    }

    public function espaceClient() {
        if (!session()->get('user_id')) {
            return redirect()->to('/login');
        }
        return view('dashboardClient');
    }

    public function voirSolde() {
        if (!session()->get('user_id')) {
            return redirect()->to('/login');
        }
        $soldeModel = new SoldeModel();
        $solde = $soldeModel->getSoldeByUserId(session()->get('user_id'));
        return view('voirSolde', ['solde' => $solde]);
    }

    public function faireDepot() {
        if (!session()->get('user_id')) {
            return redirect()->to('/login');
        }
        return view('faireDepot');
    }

    public function traiterDepot() {
        if (!session()->get('user_id')) {
            return redirect()->to('/login');
        }
        $montant = $this->request->getPost('montant');
        $userId = session()->get('user_id');

        $typeOpModel = new TypeOperationsModel();
        $typeOp = $typeOpModel->where('code', 'depot')->first();

        $soldeModel = new SoldeModel();
        $solde = $soldeModel->getSoldeByUserId($userId);
        if ($solde) {
            $soldeModel->updateSolde($userId, $solde['montant'] + $montant);
        } else {
            $soldeModel->createSolde($userId, $montant);
        }

        $transactionModel = new TransactionModel();
        $transactionModel->insertTransaction([
            'user_id' => $userId,
            'type_operation_id' => $typeOp['id'],
            'montant' => $montant
        ]);

        return redirect()->to('/voirSolde');
    }

    public function faireRetrait() {
        if (!session()->get('user_id')) {
            return redirect()->to('/login');
        }
        return view('faireRetrait');
    }

    public function traiterRetrait() {
        if (!session()->get('user_id')) {
            return redirect()->to('/login');
        }
        $montant = $this->request->getPost('montant');
        $userId = session()->get('user_id');

        $typeOpModel = new TypeOperationsModel();
        $typeOp = $typeOpModel->where('code', 'retrait')->first();

        $baremeFraisModel = new BaremeFraisModel();
        $baremes = $baremeFraisModel->where('type_operation_id', $typeOp['id'])->findAll();
        $frais = 0;
        foreach ($baremes as $bareme) {
            if ($montant >= $bareme['montant_min'] && $montant <= $bareme['montant_max']) {
                $frais = $bareme['frais'];
                break;
            }
        }

        $soldeModel = new SoldeModel();
        $solde = $soldeModel->getSoldeByUserId($userId);
        if (!$solde || $solde['montant'] < ($montant + $frais)) {
            return redirect()->to('/faireRetrait')->with('error', 'Solde insuffisant.');
        }

        $soldeModel->updateSolde($userId, $solde['montant'] - $montant - $frais);

        $transactionModel = new TransactionModel();
        $transactionModel->insertTransaction([
            'user_id' => $userId,
            'type_operation_id' => $typeOp['id'],
            'montant' => $montant,
            'frais' => $frais
        ]);

        return redirect()->to('/voirSolde');
    }

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

        $montant = $this->request->getPost('montant');
        $destinataire = $this->request->getPost('destinataire');
        $userId = session()->get('user_id');

        $clientModel = new ClientModel();
        $dest = $clientModel->getClientByNumeroTelephone($destinataire);
        if (!$dest) {
            return redirect()->to('/faireTransfert')->with('error', 'Destinataire introuvable.');
        }

        $typeOpModel = new TypeOperationsModel();
        $typeOp = $typeOpModel->where('code', 'transfert')->first();

        $baremeFraisModel = new BaremeFraisModel();
        $baremes = $baremeFraisModel->where('type_operation_id', $typeOp['id'])->findAll();
        $frais = 0;
        foreach ($baremes as $bareme) {
            if ($montant >= $bareme['montant_min'] && $montant <= $bareme['montant_max']) {
                $frais = $bareme['frais'];
                break;
            }
        }

        $soldeModel = new SoldeModel();
        $solde = $soldeModel->getSoldeByUserId($userId);
        if (!$solde || $solde['montant'] < ($montant + $frais)) {
            return redirect()->to('/faireTransfert')->with('error', 'Solde insuffisant.');
        }

        $soldeModel->updateSolde($userId, $solde['montant'] - $montant - $frais);

        $soldeDest = $soldeModel->getSoldeByUserId($dest['id']);
        if ($soldeDest) {
            $soldeModel->updateSolde($dest['id'], $soldeDest['montant'] + $montant);
        } else {
            $soldeModel->createSolde($dest['id'], $montant);
        }

        $transactionModel = new TransactionModel();
        $transactionModel->insertTransaction([
            'user_id' => $userId,
            'type_operation_id' => $typeOp['id'],
            'montant' => $montant,
            'frais' => $frais
        ]);

        return redirect()->to('/voirSolde');
    }

    public function voirHistorique() {
        if (!session()->get('user_id')) {
            return redirect()->to('/login');
        }
        $transactionModel = new TransactionModel();
        $transactions = $transactionModel->getTransactionsByUserId(session()->get('user_id'));
        return view('voirHistorique', ['transactions' => $transactions]);
    }

    public function deconnexion() {
        session()->destroy();
        return redirect()->to('/');
    }
}
