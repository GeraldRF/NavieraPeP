<?php

namespace App\Http\Controllers;

use App\Models\ConfiguracionInicial as ModelsConfiguracionInicial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Validation\Rules\Enum;
use Illuminate\Validation\Validator;
use Laravel\Jetstream\Jetstream;

class ConfiguracionInicial extends Controller
{
    public function configurar(Request $conf){

        $conf->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required'
        ]);

        User::create([
            'roll' => '2',
            'name' => $conf['name'],
            'email' => $conf['email'],
            'password' => Hash::make($conf['password']),  
        ]);
       
        ModelsConfiguracionInicial::create(['configurado'=>true]);

        return view('Home.index');
    }
}
