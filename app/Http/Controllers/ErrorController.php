<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ErrorController extends Controller
{
//    protected $error;

//    public function __construct($error)
//    {
//        $this->error = $error;
//    }

    public function error503(){
        return view('adminlte.errors.503')->with([
            'error' => 'Service Unavaiable'
        ]);
    }
    public function error404(){
        return view('adminlte.errors.404')->with([
            'error' => 'Page Not Found'
        ]);
    }
}
