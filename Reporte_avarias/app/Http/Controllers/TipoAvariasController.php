<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TipoAvariasController extends Controller
{
    public function index()
    {
        return view('Admin/TipoAvarias/index');
    }
}
