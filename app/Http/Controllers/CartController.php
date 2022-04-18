<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Items;
use App\Models\Zakaz;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\PocoController;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use App\Mail\ReviewsMail;
class CartController extends Controller
{

    public function __costruct(){
        $this->cats=Zakaz::all();
    }

    public function zakaz(){     
        $zakaz=Cart::select('items.img as img','cats.name as cat','items.name as item','carts.count as count','items.price as price','carts.id as id')
       -> where('user',Auth::user()->id)
        ->join('items','items.id','=','carts.item')
        ->join('users','users.id','=','carts.user')
        ->join('cats','cats.id','=','items.cats')->get();
        $sum=$this->sumCart();
        return view('zakaz',['zakaz'=>$zakaz,'sum'=>$sum]);
    }

    public function chtoto(){        
        
    }

     public function addZakaz(Request $r){   
        $sum=$this->sumCart();        
        $zakazs=new Zakaz();   
        $status='Принят';        
        $zakazs->sum=$sum;       
        $zakazs->payment=$r->payment;       
        $zakazs->status=$status;        
        $zakazs->user_id=Auth::user()->id;
        $zakazs->user_name=$r->name;
        $zakazs->phone=$r->phone;
        $zakazs->spare=$r->spare;
        $zakazs->user_surname=$r->surname;    
        $zakazs->date=$r->date;
        $a=$r->magaz;  
        if($a=='МИР'){
            $del=0;
            $city='Уфа';
            $street='просп. Октября';
            $house='4/1';
            $zakazs->city=$city;       
        $zakazs->street=$street;
        $zakazs->house=$house;   
                       
        } elseif(($a=='УКРТБ')){           
                $del=0;
                $city='Уфа';
                $street='ул. Генерала Горбатова';
                $house='11';
                $zakazs->city=$city;       
            $zakazs->street=$street;
            $zakazs->house=$house;   
            } elseif($a=='УКСИВТ'){                
                    $del=0;
                    $city='Уфа';
                    $street='ул. Кирова';
                    $house='65';
                    $zakazs->city=$city;       
                $zakazs->street=$street;
                $zakazs->house=$house;  
                } else{                      
                    $del=1;
                    $zakazs->city=$r->city;       
                    $zakazs->street=$r->street;
                    $zakazs->house=$r->house;
                    $zakazs->flat=$r->flat;
                    $zakazs->com=$r->com;         
                }          
        
                // where('user_id',Auth::user()->id)->
        $zakazs->delivery=$del;
        $zakaz=DB::table('carts')->where('user',Auth::user()->id)->update(['status'=>1]); 
        
        $zakazs->save();             

        return redirect()->route('email');
    }

    public function cart(){
        $cart=Cart::select('items.img as img','cats.name as cat','items.name as item','carts.count as count','items.price as price','carts.id as id')
        ->where('user',Auth::user()->id)
        ->join('items','items.id','=','carts.item')
        ->join('users','users.id','=','carts.user')
        ->join('cats','cats.id','=','items.cats')->get();
        $sum=$this->sumCart();
        return view('cart',['cart'=>$cart,'sum'=>$sum]);        
    }
    public static function sumCart(){
        $cart=Cart::selectRaw('SUM(items.price*carts.count) as sum')->join('items','items.id','=','carts.item')->where('user',Auth::user()->id)->first();
        $sum=$cart->sum;
        if(is_null($cart->sum)) $sum=0;
        return PocoController::nbspPrice($sum);
    }

    public static  function name(){
        $aff = Zakaz::selectRaw('user_name as user')->where('id',Auth::user()->id)->first(); 
       $a=$aff->user;
        return json_encode($a,JSON_UNESCAPED_UNICODE);
    }

    public static function countCart(){
        $count=Cart::selectRaw('SUM(count) as count')->where('user',Auth::user()->id)->first();
        $c=$count->count;
        if(is_null($count->count)) $c=0;
         return $c;
    }

    public function addCart(Request $r){
        $cart=Cart::where('item',$r->item)->where('user',Auth::user()->id)->where('status','0')->first();

        if (is_null($cart)){
            Cart::create([
                'item' => $r->item,
                'user'=>Auth::user()->id,           
            ]);
        }else {
            $cart->count=$cart->count+1;
            $cart->save();             
    } 
    $count=Cart::selectRaw('SUM(count) as count')->where('user',Auth::user()->id)->first();
    return $count->count;
    }

    public function countItem(Request $r){
        $cart=Cart::find($r->item);
        if($r->type=='plus'){
            $cart->count++;
        } else{
           if($cart->count>1) $cart->count--;
        }
        $item=Items::find($cart->item);
        $cart->save();
        $sumItem=$cart->count*$item->price;
        $sum=$this->sumCart();
        $countCart=$this->countCart();
        return response()->json(['count'=>$cart->count,'price'=>PocoController::nbspPrice($sumItem),'sum'=>PocoController::nbspPrice($sum),'countCart'=>$countCart],200);
    }

  

    public function deleteItem($id){
        Cart::where('carts.id',$id)->delete();
        return redirect()->route('/cart');
    }
    // ,'zakazs.userName as name',zakazs.sum as sum',

    public function sendEmail(){
        $name=Cart::select('items.img as img','carts.count','users.email as email', 'users.name as name','cats.name as cat','items.name as item','carts.count as count','items.price as price','carts.id as id')
        -> where('user',Auth::user()->id)
         ->join('items','items.id','=','carts.item')
         ->join('users','users.id','=','carts.user')
        // -> join('zakazs','zakazs.user_id','=','carts.user')
         ->join('cats','cats.id','=','items.cats')->get();
         $sum=$this->sumCart(); 
         $user = User::where('id',Auth::user()->id)->select("id", "email")->first();   
           
        //  Mail::to($user->email)->send(new ReviewsMail($name));
         return view('email',['name'=>$name]);  
       
    }

      
}


