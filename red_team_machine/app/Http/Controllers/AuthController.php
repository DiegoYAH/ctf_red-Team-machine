<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request)
	{
		try {

			Log::info('Llamada al metodo AuthController.login name = ' . $request->input('name'));

			// Comprobamos que el email y la contraseña llegan correctamente en el request
			$request->validate([
				'name' => 'required',
				'password' => 'required',
			]);

			// Se extraen las credenciales necesarios para login desde el request recibido
			$credentials = $request->only('name', 'password');

			// Si son correctas las credenciales se realiza el login y redirige a la pantalla "home" correspondiente
			if (Auth::attempt($credentials)) {
				$request->session()->regenerate();
				// $userData = Auth::user();
				return redirect()->intended(route('home'));
			}

			// Si el usuario no existe devolvemos al usuario al formulario de login con un mensaje de error
			return redirect()->route('login')->with('Error', 'wrong credentials, try again!');
		} catch (Exception $e) {
			Log::error($e->getMessage());
		}
	}

	public function logout()
	{
		try {

			Log::info('Llamada al metodo AuthController.logout');

			session()->flush();
			Auth::logout();

			return redirect('login');
			
		} catch (Exception $e) {

			Log::error($e->getMessage());
		}
	}
}
