<?php

namespace App\Models;

use CodeIgniter\Model;

class TransactionModel extends Model
{
    protected $table = 'transactions';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'user_id', 'type_operation_id', 'montant', 'frais',
        'solde_avant', 'solde_apres', 'compte_destinataire_id', 'date_operation', 'frais_externe', 'operateur_destinataire_id'
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

    public function getTotalGains()
    {
        $result = $this->db->table('transactions')
            ->selectSum('frais')
            ->get()
            ->getRow();

        return $result->frais ?? 0;
    }
    public function getTransactionsByUserId($userId) {
        return $this->select('transactions.*, types_operation.type_operation')
                     ->join('types_operation', 'types_operation.id = transactions.type_operation_id')
                     ->where('transactions.user_id', $userId)
                     ->orderBy('transactions.date_transaction', 'DESC')
                     ->findAll();
    }

    public function insertTransaction($data) {
        return $this->insert($data);
    }
}
