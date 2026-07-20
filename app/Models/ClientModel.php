<?php

namespace App\Models;
use CodeIgniter\Model;

class ClientModel extends Model {
	protected $table = 'users';
	protected $primaryKey = 'id';
	protected $allowedFields = [
        'id',
        'numero_telephone',
        'created_at'

    ];

    public function getClientByNumeroTelephone($numeroTelephone) {
        return $this->where('numero_telephone', $numeroTelephone)->first();
    }

    public function createClient($data) {
        return $this->insert($data);
    }

}