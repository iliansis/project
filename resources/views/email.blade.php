<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>    
    <h1>Спасибо,{{\App\Http\Controllers\CartController::name()}},за то что приобрели товары в нашем магазине</h1>
    <h1></h1>
    
    <div class="card" style="width: 20rem; position:absolute; top:100px; right:90px">
        <div class="card-body">       
          <h5 class="card-title">Кол-во товара в заказе:  {{\App\Http\Controllers\CartController::countCart()}}</h5>        
          @foreach($name as $n)
          <p class="card-text">{{$n->item}}, <span>{{$n->count}} шт.</span></p>          
          @endforeach
         
          <h3>Итого:</h3><h3 id="sum"> {{\App\Http\Controllers\CartController::sumCart()}} </h3>
          
        </div>

        <h5>Мы сообщим Вам, когда заказ будет собран</h5>
      </div>
    <a href="http://front:8888">Ответить</a>
</body>
</html>