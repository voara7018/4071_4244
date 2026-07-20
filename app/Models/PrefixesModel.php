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

        public function getPrefixesWithOperateurs()
        {
            return $this->db->table('prefixes')
                ->select('prefixes.*, operateurs.nom as operateur_nom')
                ->join('operateurs', 'operateurs.id = prefixes.operateur_id', 'left')
                ->get()
                ->getResultArray();
        }
    }
?>