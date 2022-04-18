@extends('layouts.main')

@section('main')
<h2>Добро пожаловать, о Великий Админ</h2>
<a href="{{route('logout')}}"></a>
<h3>Список товаров</h3>  
<section>
    <div class="container">            
            <div class="row">
                <div class="col-sm-3">
                    <div class="card" style="width: 18rem;">
                        <img src="../images/poco.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                          <h5 class="card-title">Card title</h5>
                          <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                          <a href="#" class="btn btn-danger">Удалить</a>
                          <a href="#" class="btn btn-primary">Редактировать</a>
                        </div>
                      </div>
                </div>


                <div class="col-sm-3">
                    <div class="card" style="width: 18rem;">
                        <img src="../images/iphone.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                          <h5 class="card-title">Card title</h5>
                          <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                          <a href="#" class="btn btn-danger">Удалить</a>
                          <a href="#" class="btn btn-primary">Редактировать</a>
                        </div>
                      </div>
                </div>

                <div class="col-sm-3">
                    <div class="card" style="width: 18rem;">
                        <img src="../images/samsung.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                          <h5 class="card-title">Card title</h5>
                          <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                          <a href="#" class="btn btn-danger">Удалить</a>
                          <a href="#" class="btn btn-primary">Редактировать</a>
                        </div>
                      </div>
                </div>

                <div class="col-sm-3">
                    <div class="card" style="width: 18rem;">
                        <img src="../images/honor.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                          <h5 class="card-title">Card title</h5>
                          <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                          <a href="#" class="btn btn-danger">Удалить</a>
                          <a href="#" class="btn btn-primary">Редактировать</a>
                        </div>
                      </div>
                </div>

              </div>
        </div>
       
    </div>
</section>
<h3>Список пользователей</h3>
<section>
  <div class="row">
<div class="col-3">
  <img src="../images/ava.png" alt="avatar" width="30%">
  <p><span>Марина Белова</span> г. Москва</p>
</div>
<div class="col-3">
  <img src="../images/ava.png" alt="avatar" width="30%" alt="avatar">
    <p><span>Алексей Фролов</span> г. Воронеж</p> 
</div>
</div>
  </div>
  
    
  
    
  
</section>

<br>
<br>
@endsection