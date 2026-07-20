<?php

namespace App\Models;
use CodeIgniter\Model;

class CommissionsExterneModel extends Model {
	protected $table = 'commissions_externes';
	protected $primaryKey = 'id';
	protected $allowedFields = [
        'id',
        'operateur_id',
        'montant_min',
        'montant_max',
        'frais'
    ];

    public function getCommissionsExternesByOperateurId($operateurId) {
        return $this->where('operateur_id', $operateurId)->findAll();
    }
    

}