<?php 

namespace App\Models;
use CodeIgniter\Model;

class PrefixesModel extends Model
    {
        protected $table = 'prefixes';
        protected $primaryKey = 'id';
        protected $allowedFields = [
            'operateur_id', 
            'prefixes', 
            'statut'
        ];
    }
?>