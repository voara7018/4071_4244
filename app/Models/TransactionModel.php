<?php

namespace App\Models;
use CodeIgniter\Model;

class TransactionModel extends Model {
    protected $table = 'transactions';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'id',
        'user_id',
        'type_operation_id',
        'montant',
        'frais',
        'date_transaction'
    ];

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
