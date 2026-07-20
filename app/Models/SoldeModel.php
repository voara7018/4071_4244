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
      public function getTousComptesAvecSolde()
    {
        return $this->db->table('users')
            ->select('users.id, users.numero_telephone, users.created_at, solde.montant')
            ->join('solde', 'solde.user_id = users.id', 'left')
            ->orderBy('solde.montant', 'DESC')
            ->get()
            ->getResultArray();
    }

    public function getTotalSoldes()
    {
        $result = $this->db->table('solde')
            ->selectSum('montant')
            ->get()
            ->getRow();

        return $result->montant ?? 0;
    }
    
}
