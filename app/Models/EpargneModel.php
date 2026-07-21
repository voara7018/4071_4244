<?php

namespace App\Models;
use CodeIgniter\Model;

class EpargneModel extends Model {
	protected $table = 'epargne';
	protected $primaryKey = 'id';
	protected $allowedFields = [
        'id',
        'id_clients',
        'pourcentage',
        'montant'

    ];
    
    public function getEpargneByClients($id_clients) {
        return $this->select('pourcentage')->where('id_clients', $id_clients)->first();
        
    }
    public function updateEpargne($id_clients, $montant){
         return $this->where('id_clients', $id_clients)->set('montant', $montant)->update();
    }
}