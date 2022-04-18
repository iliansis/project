@extends('layouts.main')

@section('main')
<div class="card" style="width: 20rem; position:absolute; top:100px; right:90px">
  <div class="card-body">       
    <h5 class="card-title">Кол-во товара в заказе:  {{\App\Http\Controllers\CartController::countCart()}}</h5>        
    @foreach($zakaz as $z)
    <p class="card-text">{{$z->item}}, <span>{{$z->count}} шт.</span></p>
    @endforeach
    <h3>Итого:</h3> <h3 id="sum">{{$sum}}</h3>
  </div>
</div>

<div class="row">

  <div class="col-1"></div>
  <div class="col-3">
    <a  href="{{ route('cart') }}" class="btn btn-primary p-3-2 m-1">Вернуться к корзине</a>
<h3>Оформление заказа</h3>
<form action="{{route('addZakaz')}}" method="post">
  @csrf
<h4>1. Контактные данные</h4>
    <input type="text" name="name" class="form-control me-2" placeholder="Имя" required > <br>
  <input type="number" name="phone" class="form-control me-2" placeholder="Номер телефона" required>
  </div>  
  
  
  <div class="col-3">
    <br><br><br><br><br>
    <input type="text" name="surname" class="form-control me-2" placeholder="Фамилия" required ><br>
    <input type="number" name="spare" class="form-control me-2" placeholder="Запасной номер" required>
  </div>
  <div class="col-2"></div>  
</div>
<br><br>

<div class="container" style="position: relative; left:-120px">
  <div class="row">   
    <div class="col-1"></div>
    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
      
      <li class="nav-item" role="presentation">
        <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">Самовывоз</button>
      </li>
      <li class="nav-item" role="presentation">
        <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">Доставка</button>
      </li>    
    </ul>
  
    <div class="tab-content" id="pills-tabContent">
      <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
        <h5>Выберите пункт самовывоза</h5>
        <select class="form-select w-auto" name="magaz" id="magaz">
          <option>-</option>
          <option value="МИР"> Мир, просп. Октября, 4/1, Уфа</option>
          <option value="УКРТБ">Укртб, ул. Генерала Горбатова, 11, Уфа</option>
          <option value="УКСИВТ">УКСИВТ, ул. Кирова, 65, Уфа</option>         
        </select>
      
      
     
        <br>
      <br>
    </div>
    
      <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab"><div class="container">
        <div class="col-4" style="position: relative; left:-10px"> <h4>2. Адрес получателя</h4></div>
      </div>
      <br>
      <div class="row">        
        <div class="col-2">         
          <input type="text" name="city" class="form-control me-2" placeholder="Город" >
        </div> 
        <div class="col-2">    
          <input type="text" name="street" class="form-control me-2" placeholder="Улица" >    
        </div>
        <div class="col-1">
          <input type="number" name="house" class="form-control me-2" placeholder="№ дома" > 
        </div>
        <div class="col-1">
          <input type="number" name="flat" class="form-control me-2" placeholder="№ квартиры" > 
        </div>  
      </div>
      <br>
      <div class="row">        
        <div class="col-6">
          <textarea class="form-control" name="com" id="" placeholder="Комментарий к заказу" cols="123" rows="1"></textarea> 
        </div>
      </div> 
         
           
      </div>  
    </div> 
  </div> 
    
</div>  
<br><br>
<div class="row">
  <div class="col-1"></div>
  <div class="col-3"> <h4>3. Подтверждение и оплата</h4></div>   
</div>
<br>
  <div class="row">
    <div class="col-1"></div>
    <div class="col-3">
      <h5>Выберите способ оплаты</h5>
      <select class="form-select w-auto" name="payment" id="pay">
        <option value="Наличными">Наличными</option>
        <option value="Банковской картой онлайн">Банковской картой онлайн</option>
        <option value="PayPal">PayPal</option>
        <option value="QR">Система быстрых платежей QR</option>
      </select>
      {{-- <input type="text" name="payment" class="form-control me-2" placeholder="Способ оплаты" required>  --}}
    </div>    
  </div>
  <br>
  <div class="row">
    <div class="col-1"></div>
    <div class="col-6">Выберите дату получения заказа</div>   
  </div>
  <br>
  <div class="row">
    <div class="col-1"></div>
    <div class="col-2">
      <input type="date" name="date" class="form-control"></div>   
  </div>
  <br>
  <div class="row">
    <div class="col-1"></div>
    <div class="col-6"> <h5>При получении заказа мы просим показать паспорт или другой документ на указанное имя .</h5></div>   
  </div>
<br>
  <div class="row">
    <div class="col-1"></div>
    <div class="col-3">
      <input type="checkbox" name="sogl" required id="sogl">
       <label for="sogl">Данные получателя указаны верно*</label>
    </div>   
  </div>
<br>  

<div class="row">
  <div class="col-1"></div>
  <div class="col-6"> <button class="btn btn-primary" data-csrf="{{csrf_token()}}"  id="NewDelivery">Оплатить</button></div>   
</div>
</form>

<br>
<br>
@endsection

{{-- data-csrf="{{csrf_token()}}" --}}