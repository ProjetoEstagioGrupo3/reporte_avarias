<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EquipamentosController extends Controller
{
    public function pcs()
    {
        return view('Admin/Equipamentos/computadores');
    }
    public function projets()
    {
        return view('Admin/Equipamentos/projetores');
    }
    public function switchs()
    {
        return view('Admin/Equipamentos/switchs');
    }
    public function basts()
    {
        return view('Admin/Equipamentos/bastidores');
    }
    public function accesPs()
    {
        return view('Admin/Equipamentos/accesPointss');
    }
}
