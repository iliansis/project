
@extends('layouts.main')

@section('main')
<div class="container" >
  <img src="{{$items->img}}" align="left" height="300px" width="300px"  alt="">
  <div class="row" width="30%">
    <h3>{{$items->name}}</h3>
<h5>{{\App\Http\Controllers\PocoController::nbspPrice($items->price)}}</h5>
<h5>{{$items->desc}}</h5>
<br>

<br>
<button type="button" class="btn btn-primary" id="newCart"  data-item="{{$items->id}}" data-csrf="{{csrf_token()}}">Купить</button>
  </div>
</div>
<br>
<br>
<ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
  <li class="nav-item" role="presentation">
    <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">Характеристики</button>
  </li>
  <li class="nav-item" role="presentation">
    <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">Отзывы</button>
  </li>
  <li class="nav-item" role="presentation">
    <button class="nav-link" id="pills-contact-tab" data-bs-toggle="pill" data-bs-target="#pills-contact" type="button" role="tab" aria-controls="pills-contact" aria-selected="false">Аксессуары</button>
  </li>
  <li class="nav-item" role="presentation">
    <button class="nav-link" id="v-pills-settings-tab" data-bs-toggle="pill" data-bs-target="#v-pills-settings" type="button" role="tab" aria-controls="v-pills-settings" aria-selected="false">Документация</button>
  </li>
</ul>


<div class="tab-content" id="pills-tabContent">
  <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
    <table width="100%" style="border-spacing: 7px 5px;" >
  
  <tr>
    <th>Класс
    </th>
    <th>смартфон
    </th>
  </tr>
    <tr>
      <th>
        Операционная система
        </th>
        
        <th>{{$items->system}}
        </th>
      </tr>
      <tr>
        <th>
          Дисплей
        </th>
        
        <th>{{$items->display}}</th>
      </tr>
      <tr>
        <th>Процессор</th>
      
        <th>{{$items->proc}}</th>
      </tr>
      <tr>
        <th>Объем оперативной памяти</th>        
        <th> {{$items->operative}}</th>
      </tr>
      </table>
    <br>
  <br>
</div>

  <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab"><div class="container">
    @if(Auth::check())
    <h4>Оставить отзыв</h4>
    <form action="{{route('addReviews',['id'=>$items->id])}}" method="post">
      @csrf      
      <input type="text"  name="score" placeholder="Оцените товар" class="form-control"><br>
      <input type="text"  name="text" placeholder="Оставьте отзыв" class="form-control"><br>
      <button class="btn btn-primary" type="submit">Отправить отзыв</button>
      <br>
      @include('incl/message')
    </form>
      <br>
    @endif
    <div class="container">     
      @foreach($com as $c)
      <div class="card" style="width: 18rem;">
        <div class="card-body">
          <h5 class="card-title">{{$c->users_name}}</h5>
          <h6 class="card-subtitle mb-2 text-muted">{{$c->score}}</h6>
          <p class="card-text">{{$c->text}}</p>
          <h6>{{$c->created_at}}</h6>
          <a href="#" class="card-link">Нравится</a>
          <a href="#" class="card-link">Ответить</a>
        </div>
      </div>   
      <br> 
      @endforeach
    </div>         
    
     
   <br>
   <br>
    <br>    
  </div>  
</div> 
  <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
    <section>
    <div class="container">            
            <div class="row">
                <div class="col-sm-3">
                    <div class="card" style="width: 18rem;">
                        <img src="../images/chehol.jpg" class="card-img-top" >
                        <div class="card-body">
                          <h5 class="card-title">Чехол (клип-кейс) DF poOriginal-02, для Xiaomi Poco X3/X3 Pro, синий [df pooriginal-02 (blue)]</h5>
                          <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                          <a href="/poco" class="btn btn-primary">Подробнее</a>
                        </div>
                      </div>
                </div>


                <div class="col-sm-3">
                    <div class="card" style="width: 18rem;">
                        <img src="../images/steklo.jpg" class="card-img-top">
                        <div class="card-body">
                          <h5 class="card-title">Защитное стекло для камеры BORASCO для Xiaomi Poco X3/ X3 Pro антиблик, гибридная, 1 шт </h5>
                          <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                          <a href="#" class="btn btn-primary">Подробнее</a>
                        </div>
                      </div>
                </div>

                <div class="col-sm-3">
                    <div class="card" style="width: 18rem;">
                        <img src="../images/Power Bank.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                          <h5 class="card-title">Внешний аккумулятор (Power Bank) Xiaomi Mi Power Bank 3 Pro, 20000мAч, черный </h5>
                          <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                          <a href="#" class="btn btn-primary">Подробнее</a>
                        </div>
                      </div>
                </div>

  </div>
</div>
</div>
<div class="tab-pane fade" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab"> <h2>Сертификаты</h2>
  <h4>ЕАЭС.jpg</h4></div>
</div>

<a type="button" data-bs-toggle="modal" data-bs-target="#chat" style="position: relative; left:1100px" class="btn btn-primary position-relative">
  Служба поддержки
  <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
    2 непрочитанных сообщения
    <span class="visually-hidden">unread messages</span>
  </span>
</a>
<br>
<br>


<div class="modal fade" id="chat" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
<br>
<br>
</div>
  
@endsection

