<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ClienteController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }// retirado de HomeController

    public function index()
    {
    	$clientes = \App\Cliente::all();
    	//dd($clientes);
    	// dd(); é tipo o var_dump(); do php

    	return view('cliente.index',compact('clientes')); 
    	// pasta cliente, arquivo index.php
    	//'clientes' faz referencia a $clientes
    }
}
