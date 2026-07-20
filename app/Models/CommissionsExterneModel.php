<?php

namespace App\Models;
use CodeIgniter\Model;

class CommissionsExterneModel extends Model {
	protected $table = 'commissions_externes';
	protected $primaryKey = 'id';
	protected $allowedFields = [
        'id',
        'pourcentage',

    ];
    

}