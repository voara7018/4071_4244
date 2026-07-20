<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\TransactionModel;
use App\Models\SoldeModel;

class TransactionController extends BaseController
{
    protected $transactionModel;
    protected $soldeModel;

    public function __construct()
    {
        $this->transactionModel = new TransactionModel();
        $this->soldeModel = new SoldeModel();
    }

    public function gains()
    {
        $data = [
            'parType' => $this->transactionModel->getGainsParType(),
            'totalGeneral' => $this->transactionModel->getTotalGains(),
        ];

        return view('situation', $data);
    }

    public function comptes()
    {
        $comptes = $this->soldeModel->getTousComptesAvecSolde();

        $data = [
            'comptes' => $comptes,
            'nbComptes' => count($comptes),
            'totalSoldes' => $this->soldeModel->getTotalSoldes(),
        ];

        return view('comptes', $data);
    }
}
