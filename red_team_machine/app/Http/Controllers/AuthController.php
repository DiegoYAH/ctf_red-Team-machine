<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Cookie;

class AuthController extends Controller
{
	public function login(Request $request)
	{
		try {

			Log::info('Llamada al metodo AuthController.login name = ' . $request->input('av_userName'));

			// Comprobamos que el email y la contraseña llegan correctamente en el request
			$request->validate([
				'av_userName' => 'required',
				'password' => 'required',
			]);

			// Se extraen las credenciales necesarios para login desde el request recibido
			$credentials = $request->only('av_userName', 'password');

			// Si son correctas las credenciales se realiza el login y redirige a la pantalla "home" correspondiente
			if (Auth::attempt($credentials)) {
				$request->session()->regenerate();
				// $user = Auth::user();

				// $role = Cookie::get('user_role', $user->role);
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

	public function update(Request $request)
	{ {
			try {
				$user = User::findOrFail($request->idPassChange);
				if ($user) {
					$user->password = Hash::make($request->new_password);
					$user->save();

					Log::info('Cambio de contraseña correcto');

					return back()->with('success', 'Password successfully updated.');
				} else {
					return back()->withErrors(['error' => 'Usuario no encontrado.']);
				}
			} catch (Exception $e) {

				Log::error($e->getMessage());
			}
		}
	}
}
