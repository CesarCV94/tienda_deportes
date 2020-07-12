<?php

namespace App\Http\Controllers;

use App\User; 
use Validator;
use Exception;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; 
use Laravel\Passport\Client as OClient; 
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Response;


class UserController extends Controller
{
    public function register(Request $request){
        // validar los campos del request
        $validator = Validator::make($request->all(),[
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required',
            'c_password' => 'required|same:password'
        ]);
        
        // si la validacion tiene errores retornamos el error.
        if($validator->fails()){
            return response()->json(['error' => $validator->errors()],401);
        }

        $password = $request->password;
        // obteneos los campos
        $input = $request->all();
        // encriptamos la contraseña
        $input['password'] = bcrypt($input['password']);

        // registrar el usuario
        $user = User::create($input);
        return response()->json([
            'mensaje' => 'El usuario ha sido registrado correctamente'
        ],Response::HTTP_OK);

    }

    public function AuthClient(){
        // obtenemos el registro del oauth_client
        $oClient = Oclient::where('password_client',1)->first();

        return response()->json([
            'client_id' => $oClient->id,
            'client_secret' => $oClient->secret
        ],Response::HTTP_OK);
    }
    public function unauthorized(){
        return response()->json('unauthorized',401);
    }
    public function logout(Request $request){
        $request->user()->token->revoke();
        return response()->json([
            'mensaje' => 'Sesión cerrada correctamente.'
        ],Response::HTTP_OK);
    }

    public function details(){
        $user = Auth::user();
        return response()->json($user,200);
    }
}
