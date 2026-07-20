<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\TransactionModel;

class TransactionController extends BaseController
{
    protected $transactionModel;

    public function __construct()
    {
        $this->transactionModel = new TransactionModel();
    }

    public function gains()
    {
        $data = [
            'parType'      => $this->transactionModel->getGainsParType(),
            'totalGeneral' => $this->transactionModel->getTotalGains(),
        ];

        return view('admin/situation', $data);
    }
}