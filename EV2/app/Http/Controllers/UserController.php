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

        $credenciales = $_request->only('email','password');

        if(Auth::attempt($credenciales)){
            //Verificar que el usuario esté activo
            $user = Auth::user();
            //Si es que el usuario está desactivado sale.
            if (!$user->activo){
                Auth::logout();
                return redirect()->route('usuario.login')->withErrors(['email'=>'El usuario se encuentra desactivado']);
            }
            //Si el usuario está activo
            $_request->session()->regenerate();
            return redirect()->route('backoffice.dashboard');
        }
        return redirect()->back()->withErrors(['email'=>'El usuario o contraseña son incorrectos']);
    }

    public function logout(Request $_request){
        Auth::logout();
        $_request->session()->invalidate();
        $_request->session()->regenerateToken();
        return redirect()->route('usuario.login');
    }


    public function registrar(Request $_request){
        // Agrega este dd() para depurar la solicitud

        $mensajes = [
            'nombre.required' => 'El nombre es obligatorio.',
            'email.required' => 'El email es obligatorio.',
            'email.email' => 'El email no tiene un formato válido.',
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
        date_default_timezone_set('UTC');
        if($datos['dayCode'] != date("d")){
            return back()->withErrors(['message' => 'El código del día no es válido.']);
        }

        try {
            User::create([
                'nombre' => $datos['nombre'],
                'email' => $datos['email'],
                'password' => Hash::make($datos['password'])
            ]);
            return redirect()->route('usuario.login')->with('success', 'Usuario creado exitosamente.');
        } catch (Exception $e) {
            if($e->getCode()==23000){
                return back()->withErrors(['message'=>'Error: El usuario ya existe.']);
            }
            return back()->withErrors(['message' => 'Error: '. $e->getMessage()]);
        }        
    }
}
