<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="css/style.css">

    <title>Hello, world!</title>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="/">Navbar</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="/main">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Link</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Dropdown
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="#">Action</a></li>
                            <li><a class="dropdown-item" href="#">Another action</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="#">Something else here</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link disabled">Disabled</a>
                    </li>
                </ul>
                <form class="d-flex">
                    @if (Auth::check())
                        <a href="{{ route('cart') }}" class="btn btn-primary p-3-2 m-1">Корзина <span class="Badge-bg-secondary" id="countCart">{{\App\Http\Controllers\CartController::countCart()}}</span></a>
                        <a href="{{ route('logout') }}" class="btn btn-primary p-3-2 m-1">Выход</a>
                    @else
                        <a type="button" class="btn btn-primary p-3-2 m-1" data-bs-toggle="modal"
                            data-bs-target="#auth">Вход</a>
                        <a type="button" class="btn btn-primary m-1" data-bs-toggle="modal"
                            data-bs-target="#reg">Регистрация</a>
                    @endif
                </form>
            </div>
        </div>
    </nav>
    <br>
    <div class="modal fade" id="auth" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id='auth'>
                    @csrf
                    <div class="modal-body">
                        <input class="form-control me-2" type="text" name="email" placeholder="Имя"> <br>
                        <input class="form-control me-2" type="text" name="password" placeholder="Введите пароль"> <br>
                    </div>
                    <div class="modal-footer">

                        <button class=" btn btn-primary" type="submit" name="auth">Войти</button>
                    </div>
                </form>


                <div id="error_auth" style="display: none">
                    <div class="alert alert-danger" role="alert">
                        A simple danger alert—check it out!
                    </div>
                </div>


            </div>
        </div>
    </div>



    <div class="modal fade" id="reg" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id='register'>
                    @csrf
                    <div class="modal-body">
                        <input class="form-control me-2" type="text" name="name" placeholder="Имя"> <br>
                        <input class="form-control me-2" type="email" name="email" placeholder="email"> <br>
                        <input class="form-control me-2" type="password" name="pass1" placeholder="Введите пароль"> <br>
                        <input class="form-control me-2" type="password" name="pass2" placeholder="Повторите пароль">
                        <br>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" name="reg" class="btn btn-primary">Зарегистрироваться</button>
                    </div>
                </form>
                <br>
                <div id="success" style="display: none">
                    <div class="alert alert-success" role="alert">
                        Вы успешно зарегистрировались
                    </div>
                </div>

                <div id="error" style="display: none">
                    <div class="alert alert-danger" role="alert">
                        A simple danger alert—check it out!
                    </div>
                </div>

            </div>
        </div>
    </div>
</head>

<body>






    @yield('main')        
        <footer class="py-3 my-4 footer-dark bg-dark">        
            <p class="text-center text-muted">© 2021 Какая-то компания все права защищены</p>
          </footer>

      <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>         
     <script src="public/js/main.js"></script>         
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
    
</body>


</html>
