<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class loginController extends Controller
{
   public function login(LoginRequest $r){
    if (Auth::attempt(['email'=>$r->email,'password'=>$r->password],true)){
        return redirect()->route('cart'); 
    
   } else{
       return response()->json(['errors'=>['ошибка авторизации, неверный логин или пароль']], 401);
   }
}
public function logout(){
    Auth::logout();
    return redirect()->route('home');
}
}
