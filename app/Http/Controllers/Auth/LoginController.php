<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
<<<<<<< HEAD
use App\Models\User;
=======
use App\Models\usuarios;
>>>>>>> 3f8e9f28ebb8491b648cfc1b552d646921f922e3
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

class LoginController extends Controller{
    public function index(){
        if(Auth::check()){
            return redirect()->route('dashboard');
        }
        return view('auth.login');
    }

    public function login(Request $request){
        //$user = \App\Models\usuarios::where('correo', $credentials['correo'])->first();
<<<<<<< HEAD
        //VALIDAMOS        
        if(!Auth::validate($request->only('email','password'))){
=======

        //VALIDAMOS CREDENCIALES
        if(!Auth::validate($request->only('correo','password'))){
>>>>>>> 3f8e9f28ebb8491b648cfc1b552d646921f922e3
            return back()->withErrors([
                'username' => 'Las credenciales no coinciden con nuestros registros.'
            ]);
        }

<<<<<<< HEAD
        $user = Auth::getProvider()->retrieveByCredentials($request->only('email','password'));
=======
        $user = Auth::getProvider()->retrieveByCredentials($request->only('correo','password'));
>>>>>>> 3f8e9f28ebb8491b648cfc1b552d646921f922e3
        Auth::login($user);

        return redirect()->route('dashboard')->with('success', 'Bienvenido ' . $user->name);

        //CREARMOS UNA SESION

    }

    public function logout(Request $request){
        Session::flush();
        Auth::logout();

        return redirect('/');
    }

}
