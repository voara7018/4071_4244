<?php

namespace App\Controllers;
use App\Models\EpargneModel;


use Exception;


class EpargneController extends BaseController
{
    public function index()
    {
        $id_clients = session()->get('user_id');
        $data['users'] = $id_clients;
        return view('insererEpargne', $data);
    }
    public function insert(){
        $epargneModel = new EpargneModel();
        $pourcentage = $this->request->getPost('epargne');
        $clients = $this->request->getPost('id_clients');
        $data = [
            'id_clients' => $clients,
            'pourcentage' => $pourcentage
        ];
        try {
            $epargneModel->insert($data);
            return redirect()->to('/espaceClient')->with('success', 'Le préfixe a été ajouté avec succès.');

        } catch (Exception $e) {
            return redirect()->to('/espaceClient')->with('error', 'Une erreur est survenue lors de l\'ajout du préfixe : ' . $e->getMessage()); 
    }
    }   
}