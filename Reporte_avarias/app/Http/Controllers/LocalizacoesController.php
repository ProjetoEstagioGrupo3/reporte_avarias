<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LocalizacoesController extends Controller
{
    public function index()
    {
        return view('Admin/Localizacoes/index');
    }
}
