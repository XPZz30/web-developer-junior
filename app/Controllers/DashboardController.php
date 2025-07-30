<?php

namespace App\Controllers;

class DashboardController extends BaseController
{
    public function index()
    {
        if (!session()->get('usuario_logado')) {
            return redirect()->to('/login');
        }

        return view('dashboard');
    }
}
