<?php

namespace App\Controllers;
use App\Controllers\BaseController;
use App\Models\TypeOperationsModel;
use App\Models\BaremeFraisModel;

class OperationController extends BaseController
{
    public function index()
    {
        $type_operationsModel = new TypeOperationsModel();
        $type_operations = $type_operationsModel->getAllTypesOperations();
        return view('ajouterOperation', ['type_operations' => $type_operations]);
    }

    public function insert_operation()
    {
        $data = [
            'type_operation_id' => $this->request->getPost('type_operation'),
            'montant_min' => $this->request->getPost('montant_min'),
            'montant_max' => $this->request->getPost('montant_max'),
            'frais' => $this->request->getPost('frais')
        ];
        $baremeFraisModel = new BaremeFraisModel();
        $baremeFraisModel->insertBaremeFrais($data);

        return redirect()->to('/');
    }
}