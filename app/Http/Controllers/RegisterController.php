<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mockery\Matcher\Type;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function profile(){
        return view('profile');
    }


    public function register(RegisterRequest $r) {
        if ($r->pass1==$r->pass2){
            User::create([
                'name' =>$r->name,
                'email' =>$r->email,
                'password'=>Hash::make($r->pass1)
            ]
                
            );
            return true;
        }   else {
            return response()->json(['errors'=>['password' => 'Пароли не совпадают']], 400 );
        }

        
    }
}
