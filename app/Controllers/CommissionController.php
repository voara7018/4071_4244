<?php

namespace App\Controllers;
use App\Models\PrefixesModel;
use App\Models\OperateurModel;
<<<<<<< HEAD
use App\Models\CommissionsExterneModel;

=======
>>>>>>> 260425304b8d7c3fe943020acbd9139a101a2e69
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
<<<<<<< HEAD
            return redirect()->to('/situation_financiere')->with('success', 'Le préfixe a été ajouté avec succès.');
=======
            return redirect()->to('/situation')->with('success', 'Le préfixe a été ajouté avec succès.');
>>>>>>> 260425304b8d7c3fe943020acbd9139a101a2e69
        } catch (Exception $e) {
            return redirect()->to('/situation')->with('error', 'Une erreur est survenue lors de l\'ajout du préfixe : ' . $e->getMessage()); 
    }
    }   
}