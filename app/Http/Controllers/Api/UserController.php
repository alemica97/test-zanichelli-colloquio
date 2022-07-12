<?php

namespace App\Http\Controllers\Api;
use Redirect,Response;
use Illuminate\Http\Request;
use App\DatabaseJson\Models\User;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function index()
   {
      return view('welcome');
   }  
 
  public function store(Request $request)
  {

    // Validazione dei dati immessi nel form
    $request->validate([
    'form.nome' => 'required|min:3|max:150|regex:/^[a-zA-Z\s]+$/',
    'form.cognome' => 'required|min:3|max:150|regex:/^[a-zA-Z\s]+$/',
    'form.email' => 'required|email',
    ]);

    $data = $request->all();

    $user = new User();

    $user->nome = $data['form']['nome'];
    $user->cognome = $data['form']['cognome'];
    $user->email = $data['form']['email'];

    $user->save();

    return json_encode($user);
  }
}