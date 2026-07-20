<?php

namespace App\Controllers;
use App\Controllers\BaseController;

class AdminController extends BaseController {
    
    public function login() {
        // If already logged in as admin, redirect to dashboard
        if (session()->get('is_admin')) {
            return redirect()->to('/admin/dashboard');
        }
        return view('loginAdmin');
    }

    public function authenticate() {
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        // Simple hardcoded admin check for now
        if ($username === 'admin' && $password === 'admin') {
            session()->set('is_admin', true);
            session()->set('numero_telephone', 'Admin');
            return redirect()->to('/admin/dashboard');
        }

        return redirect()->to('/admin')->with('error', 'Identifiants incorrects.');
    }

    public function dashboard() {
        if (!session()->get('is_admin')) {
            return redirect()->to('/admin');
        }
        return view('dashboardAdmin');
    }

    public function logout() {
        session()->destroy();
        return redirect()->to('/admin');
    }
}
