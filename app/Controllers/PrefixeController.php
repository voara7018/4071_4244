<?php

namespace App\Controllers;
use App\Models\PrefixesModel;
use Exception;


class PrefixeController extends BaseController
{
    public function index(): string
    {
        $prefixesModel = new PrefixesModel();
        $data['prefixes'] = $prefixesModel->findAll();
        return view('prefixes', $data);
    }
    public function insert(){
        $prefixesModel = new PrefixesModel();
        $prefixes = $this->request->getPost('prefixes');
        $data = [
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