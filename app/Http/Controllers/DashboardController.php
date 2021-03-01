<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \Spatie\Permission\Exceptions\UnauthorizedException;

class DashboardController extends Controller
{
    public function index(){
        return view('dashboard')
            ->with('settings', $this->getSettings());
    }
}
