<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EquipamentosController extends Controller
{
    public function index()
    {
        return view('Admin/Equipamentos/index');
    }
    public function pcs()
    {
        return view('Admin/Equipamentos/computadores');
    }
}
