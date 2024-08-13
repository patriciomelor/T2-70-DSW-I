<?php

namespace App\Http\Controllers;

use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{
    public function formularioLogin(){
        if(Auth::check()){
            return redirect()->route('backoffice.dashboard');
        }
        return view('usuario.login');
    }

    public function formularioNuevo(){
        if(Auth::check()){
            return redirect()->route('backoffice.dashboard');
        }
        return view('usuario.create');
    }
    public function login(Request $_request){
        $mensajes = [
            'email.email' => 'El email no tiene un formato válido',
            'email.required' => 'El email es obligatorio',
            'password.required' => 'La contraseña es obligatoria'
        ];
        $_request->validate([
            'email'=>'required|email',
            'password' => 'required'
        ], $mensajes);
    }

    public function registrar(Request $_request){
        $mensajes = [
            'nombre.required' => 'El nombre es obligatorio.',
            'email.required' => 'El email es obligatorio.',
            'email.email' => 'El email no tieen un formato válido.',
            'password.required' => 'La contraseña es obligatoria.',
            'rePassword.required' => 'Repetir contraseña es obligatorio.',
            'dayCode.required' => 'El código del día es obligatorio.',
        ];
        $_request->validate([
            'nombre' => 'required|string|max:50',
            'email' => 'required|email',
            'password' => 'required',
            'rePassword' => 'required',
            'dayCode' => 'required',
        ], $mensajes);
        
        $datos = $_request->only('nombre', 'email', 'password', 'rePassword', 'dayCode');

        // Verificación de contraseña
        if($datos['password'] != $datos['rePassword']){
            return back()->withErrors(['message' => 'Las contraseñas ingresadas no coinciden']);
        }

        // Verificación del código del día
        if($datos['dayCode'] !=date("d")){
            return back()->withErrors(['message'=>'El código del día no es válido.']);
        }

        try {
            User::create([
                'nombre' => $datos['nombre'],
                'email' => $datos['email'],
                'password' => Hash::make($datos['password'])
            ]);
            return redirect()->route('usuario.login')->with('success', 'Usuario creado exitosamente.');
        } catch (Exception $e) {
            return back()->withErrors(['message'=>'Error: '. $e->getMessage()]);
        }        
    }
}
