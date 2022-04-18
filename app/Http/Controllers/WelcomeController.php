<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cats;
use App\Models\Items;

class WelcomeController extends Controller
{
 
    public function welcome(Request $r){
        $cats=Cats::all();
        if(is_null($r->id)) {
            $items=Items::all();
        } else {
           $items=Items::where('cats',$r->id)->get(); 
        }
        
        return view('welcome',['cats'=>$cats,'items'=>$items]);
    }  

    
}
