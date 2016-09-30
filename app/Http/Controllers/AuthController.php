<?php

namespace App\Http\Controllers;
//namespace App\Models;

//use Illuminate\Http\Request;

use App\Http\Requests;

use Illuminate\Support\Facades\Validator;

use Request;

use Illuminate\Support\Facades\Redirect;

use Auth;

use App\Models\User;

use Illuminate\Support\Facades\Route;

class AuthController extends Controller
{
    public function getLogin(){
        return View('todo.login');
    }  


    public function postLogin(){       
    $rules = array('username' => 'required', 'password' => 'required');
     
    $validator = Validator::make(Request::all(), $rules);    
    if($validator->fails()){
        return Redirect::route('user-login')->withErrors($validator);
    }
     
  	$auth = Auth::attempt(array(           
        'email' => Request::get('username'),
        'password' => Request::get('password'),
    ), false);
     
    if(! $auth){
        return Redirect::route('user-login')->withErrors(array(
            'Ошибка авторизации'
        ));
    }
     
    return Redirect::route('todo');
     
	}


}
