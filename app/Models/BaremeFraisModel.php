<?php

namespace App\Models;
use CodeIgniter\Model;

class BaremeFraisModel extends Model {
    protected $table = 'bareme_frais';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'id',
        'type_operation_id',
        'montant_min',
        'montant_max',
        'frais'
    ];

    public function getBaremeFrais($typeOperationId) {
        return $this->where('type_operation_id', $typeOperationId)->findAll();
    }

    public function insertBaremeFrais($data) {
        return $this->insert($data);
    }
}