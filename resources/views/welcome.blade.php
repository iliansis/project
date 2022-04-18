

@extends('layouts.main')

@section('main')

<style>
  .element {
    display: -webkit-box;
    -webkit-line-clamp: 3;
    -webkit-box-orient: vertical;
    overflow: hidden;
  }
</style>

<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Фильтры
</button>
<br>
<br>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Выберите бренд(ы)</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="col-3">
          <ul class="list-group list-group-flush">
            @foreach($cats as $c)
            <a href="/cat/{{$c->id}}"> <li class="list-group-item">{{$c->name}}</li></a>
            @endforeach
          </ul>
        </div>
      </div>
      <div class="modal-footer">        
       
      </div>
    </div>
  </div>
</div>



<section>
  <div class="container">
    <div class="row">
      @foreach($items as $i)
      
        <div class="col-3">
            <div class="card" style="width: 18rem;">
                <img src="{{$i->img}}" class="card-img-top"   max-width= 700px >
                <div class="card-body">
                  <div class="element">
                  <h5 class="card-title">{{$i->name}}</h5>
                </div>   
                  {{-- <h6 class="card-title">{{\App\Http\Controllers\WelcomeController::nbspPrice($items->price)}}</h6> --}}
                  <div class="element"><p class="card-text">{{$i->desc}}</p></div>                  
                  <a href="/items/{{$i->id}}" class="btn btn-primary">Подробнее</a>
                </div>
              </div>
        </div>
        @endforeach     
       
      </div>  
  </div>
   
              
    
</section>



  <br>
<br>

@endsection