<?php

namespace App\Controllers;
use App\Models\PrefixesModel;
use App\Models\OperateurModel;
use Exception;


class PrefixeController extends BaseController
{
    public function index()
    {
        $prefixesModel = new PrefixesModel();
        $data['prefixes'] = $prefixesModel->findAll();
        $operateursModel = new OperateurModel();
        $operateurs['operateurs'] = $operateursModel->findAll();
        return view('prefixes', $data, $operateurs);
    }
    public function insert(){
        $prefixesModel = new PrefixesModel();
        $prefixes = $this->request->getPost('prefixes');
        $operateursModel = new OperateurModel();
        $operateurs['operateurs'] = $operateursModel->findAll();
        $data = [
            'operateur_id' => $operateursModel->getOperatorId(),
            'prefixes' => $prefixes,
            'statut' => 1
        ];
        try {
            $prefixesModel->insert($data);
            return redirect()->to('/prefixes')->with('success', 'Le préfixe a été ajouté avec succès.');
        } catch (Exception $e) {
            return redirect()->to('/prefixes')->with('error', 'Une erreur est survenue lors de l\'ajout du préfixe : ' . $e->getMessage()); 
    }
    }   
}