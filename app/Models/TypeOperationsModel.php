<?php

namespace App\Models;
use CodeIgniter\Model;

class TypeOperationsModel extends Model {
	protected $table = 'types_operation';
	protected $primaryKey = 'id';
	protected $allowedFields = [
		'id',
		'code',
		'type_operation'

	];
	public function getAllTypesOperations() {
		return $this->findAll();
	}

}