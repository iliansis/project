<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Items;
use App\Models\Zakaz;
use App\Http\Controllers\PocoController;
use Illuminate\Support\Facades\Auth;

class ZakazController extends Controller
{
    public function zakaz(){     
        
        return view('zakaz');
    }   

  
}
