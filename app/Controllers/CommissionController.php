<?php

namespace App\Controllers;
use App\Models\PrefixesModel;
use App\Models\OperateurModel;
use App\Models\CommissionsExterneModel;


use Exception;


class CommissionController extends BaseController
{
    public function index()
    {
        $operateursModel = new OperateurModel();
        $data['operateurs'] = $operateursModel->findAll();
        return view('commission', $data);
    }
    public function insert(){
        $prefixesModel = new CommissionsExterneModel();
        $pourcentage = $this->request->getPost('commission');
        $operateurs = $this->request->getPost('operateurid');
        $data = [
            'pourcentage' => $pourcentage,
        ];
        try {
            $prefixesModel->insert($data);
            return redirect()->to('/situation_financiere')->with('success', 'Le préfixe a été ajouté avec succès.');

            return redirect()->to('/situation')->with('success', 'Le préfixe a été ajouté avec succès.');

        } catch (Exception $e) {
            return redirect()->to('/situation')->with('error', 'Une erreur est survenue lors de l\'ajout du préfixe : ' . $e->getMessage()); 
    }
    }   
}