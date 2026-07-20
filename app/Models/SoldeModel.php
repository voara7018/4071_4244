<?php

namespace App\Models;
use CodeIgniter\Model;

class SoldeModel extends Model {
    protected $table = 'solde';
    protected $allowedFields = [
        'user_id',
        'montant'
    ];

    public function getSoldeByUserId($userId) {
        return $this->where('user_id', $userId)->first();
    }

    public function createSolde($userId, $montant = 0) {
        return $this->insert([
            'user_id' => $userId,
            'montant' => $montant
        ]);
    }

    public function updateSolde($userId, $montant) {
        return $this->where('user_id', $userId)->set('montant', $montant)->update();
    }
    
}
