<?php

namespace App\Http\Controllers\Backend\User;

use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
  
    public function dashboard()
    {
        
        return view('backend.user.dashboard');
    }
}
