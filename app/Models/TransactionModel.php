<?php

namespace App\Models;

use CodeIgniter\Model;

class TransactionModel extends Model
{
    protected $table = 'transactions';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'user_id', 'type_operation_id', 'montant', 'frais',
        'solde_avant', 'solde_apres', 'compte_destinataire_id', 'date_operation'
    ];
    protected $useTimestamps = false;

    public function getGainsParType()
    {
        return $this->db->table('transactions')
            ->select('types_operation.code, types_operation.type_operation, 
                      COUNT(transactions.id) as nb_operations, 
                      SUM(transactions.frais) as total_frais')
            ->join('types_operation', 'transactions.type_operation_id = types_operation.id')
            ->groupBy('types_operation.id')
            ->get()
            ->getResultArray();
    }

    // Total général des frais
    public function getTotalGains()
    {
        $result = $this->db->table('transactions')
            ->selectSum('frais')
            ->get()
            ->getRow();

        return $result->frais ?? 0;
    }
}