@extends('layouts.main')

@section('main')


  <div class="row">
    <div class="col-1  text-center" >  <b>№</b></div>    
    <div class="col-2  text-center"><b>Изображение</b></div>
    <div class="col-3  text-center"><b>Название товара</b></div>
    <div class="col-2  text-center" ><b>Колличество</b> </div>
    <div class="col-1  text-center"><b>Цена </b></div>
    <div class="col-2 text-center"><b>Сумма</b></div>
  </div>  
     
  @if(!$cart->isEmpty())
  @foreach($cart as $c)
  <div class="row d-flex align-items-center">
    <div class="col-1 text-center">{{$c->id}}</div>
     
    <div class="col-2 text-center"> <img src="{{$c->img}}" height="100" ></div>
  <div class="col-3 text-center">{{$c->item}}</div>
  <div class="col-2 text-center">
    <button type="button" class="count" onclick="count(this,'plus', '{{csrf_token()}}')" data-id="{{$c->id}}">+</button>
  <span id="count{{$c->id}}">{{$c->count}}</span>
<button type="submit" class="count" onclick="count(this,'minus', '{{csrf_token()}}')" data-id="{{$c->id}}" >-</button>
  </div> 
<div class="col-1 text-center"><b>{{\App\Http\Controllers\PocoController::nbspPrice($c->price)}}</b></div>
<div class="col-2 text-center"><b id="sum{{$c->id}}">{{\App\Http\Controllers\PocoController::nbspPrice($c->price*$c->count)}}</b></div>
<div class="col-1">
  <a href="{{route('deleteItem',$c->id)}}" type="button" class="btn-close"></a>
</div>
  </div>
<br>
@endforeach
@else 
<div class="col-12 text-center my-2">
  <h3>В корзине пустовато... Самое время что-то приобрести))</h3>
</div>
@endif
<br>
<div class="col-11 text-end">
  <h4>Итоговая сумма покупок:</h4>
<h3 id="sum">{{$sum}}</h3>
<a href="/zakaz" class="btn btn-primary">Купить</a>
</div>

<br>
<br>

</section>

@endsection