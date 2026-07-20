<?php

namespace App\Models;
use CodeIgniter\Model;

class OperateurModel extends Model {
	protected $table = 'operateurs';
	protected $primaryKey = 'id';
	protected $allowedFields = [
        'id',
        'nom',
        'is_local'

    ];

    public function getOperatorId() {
        $operator = $this->where('is_local', 1)->first();
        return $operator ? $operator['id'] : null;
    }

}
