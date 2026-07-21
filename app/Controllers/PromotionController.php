<?php

namespace App\Controllers;
use App\Models\PrefixesModel;
use App\Models\PromotionModel;


use Exception;


class PromotionController extends BaseController
{
    public function index()
    {
        $promotion = new PromotionModel();
        $prom = $promotion->first();
        return view('promotionTransfert');
    }
    public function insert(){
        $promotionModel = new PromotionModel();
        $pourcentage = $this->request->getPost('promotion');
        $data = [
            'pourcentage' => $pourcentage,
        ];
        try {
            $promotionModel->insert($data);
            return redirect()->to('/situation_financiere')->with('success', 'Le préfixe a été ajouté avec succès.');

            return redirect()->to('/situation')->with('success', 'Le préfixe a été ajouté avec succès.');

        } catch (Exception $e) {
            return redirect()->to('/situation')->with('error', 'Une erreur est survenue lors de l\'ajout du préfixe : ' . $e->getMessage()); 
    }
    }   
}