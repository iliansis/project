<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cats;
use App\Models\Items;
use App\Models\Reviews;
use App\Http\Requests\ReviewRequest;
use Illuminate\Support\Facades\Auth;

class PocoController extends Controller
{

    public function __costruct(){
        $this->cats=Cats::all();
    }

    public function details(Request $r){
     $items=Items::where('id',$r->id)->first();
     $reviews=Reviews::where('item',$r->id)->get();
     return view('poco',['items'=>$items,'com'=>$reviews]);
    }
    // select('users.name as user','reviews.score as score','reviews.text as text')->join('cats','cats.id','items.cat')
    

    static function nbspPrice($price){
        $len=strlen($price);
        if ($len==4){
            $price=substr($price, 0, 1).'  '.substr($price,1,3);
        }
        elseif ($len==5){
            $price=substr($price, 0, 2).'  '.substr($price,2,3);
        }
        elseif ($len==6){
            $price=substr($price, 0, 3).'  '.substr($price,3,3);
        }
        return $price;
        
    }

    public function addReviews(ReviewRequest $r, $id ) {
        $review=new Reviews();

        $review->users_id=Auth::user()->id;
        $review->users_name=Auth::user()->name;
        $review->score=$r->score;
        $review->text=$r->text;
        $review->item=$id;

        // Reviews::create([
        //     'users'=>$r->users,
        //     'score'=>$r->score,
        //     'text'=>$r->text,
        //     'item'=>$id

    $review->save();

        return redirect()->route('item',['id'=>$id])->with('success','Спасибо за отзыв');

    }

    public function poco(){
        return view('poco');
    }

   
 
}

