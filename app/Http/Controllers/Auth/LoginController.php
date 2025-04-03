<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\usuarios;
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

        //VALIDAMOS CREDENCIALES
        if(!Auth::validate($request->only('correo','password'))){
            return back()->withErrors([
                'username' => 'Las credenciales no coinciden con nuestros registros.'
            ]);
        }

        $user = Auth::getProvider()->retrieveByCredentials($request->only('correo','password'));
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
