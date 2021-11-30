<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class HomeController extends Controller
{
    public function index(){
         if(Auth::user()->roll != 2){
            return "Acceso denegado";
         }else{
            return view('admin.index'); 
         }
    }

    public function informe_estadistica(){





        return 'pdf';
        
    }
}
