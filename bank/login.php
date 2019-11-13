<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>BANK</title>
    <meta name="description" content="Projekt banku">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="sitestyle.css">
</head>

<body>
<?php
session_start();
@$isLoggedIn= $_SESSION['isLoggedIn'];
?>
<?php require_once ('topmenu.php')?>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-4 login-sec">
            <h2 class="text-center" style="color:red">Zaloguj się</h2>
            <form class="login-form" action="loginscript.php" method="post">
                <div class="form-group">
                    <label for="ID" class="text-uppercase" style="color:red">ID</label>
                    <input type="text" id="ID" class="form-control" name="login" placeholder="">
                </div>
                <div class="form-group">
                    <label for="password" class="text-uppercase" style="color:red">Hasło</label>
                    <input type="password" id="password" class="form-control" name="haslo" placeholder="">
                </div>
                <div class="form-group form-check">
                    <input type="checkbox" class="form-check-input" id="admin" name="admin">
                    <label class="form-check-label" for="admin">Zaloguj jako admin</label>
                </div>
                <button type="submit" class="btn btn-login btn-custom float-right">Zaloguj</button>
            </form>
        </div>
        <div class="col-md-8 container-custom">
            <div class="bd-example">
                <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
                        <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
                        <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
                    </ol>
                    <div class="carousel-inner karuzela">
                        <div class="carousel-item active">
                            <img src="resources/images/1slider.jpg" class="d-block w-100" alt="...">
                            <div class="carousel-caption d-none d-md-block">
                                <h5>Nasz Bank</h5>
                                <p>Załóż konto już dziś</p>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img src="resources/images/2slider.jpg" class="d-block w-100" alt="...">
                            <div class="carousel-caption d-none d-md-block">
                                <h5 style="color: black;">Konta</h5>
                                <p style="color: black;">Konta dopasowane do Twoich potrzeb</p>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img src="resources/images/3slider.jpg" class="d-block w-100" alt="...">
                            <div class="carousel-caption d-none d-md-block">
                                <h5 style="color: black;">Karty</h5>
                                <p style="color: black;">Duży wybór kart</p>
                            </div>
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button"
                       data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleCaptions" role="button"
                       data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<footer class="py-5 bg-dark ">
    <div class="container">
        <div class="float-left">
            <a href="#"><img src="resources/images/phone.png" alt="telefon" style="width: 50px; height: 50px;"></a>
            <b class="ml-2" style="color: red; font-size: 20px;">666-666-666</b>
        </div>
        <div class="float-right">
            <a href="#"><img src="resources/images/facebook.png" alt="facebook"
                             style="width: 50px; height: 50px;"></a>
            <a href="#"><img src="resources/images/twitter.png" alt="twitter"
                             style="width: 50px; height: 50px;"></a>
            <a href="#"><img src="resources/images/instagram.png" alt="instagram"
                             style="width: 50px; height: 50px;"></a>
        </div>
        <p class="m-0 text-center text-white">Copyright &copy; Rafał Wawiórka</p>
    </div>
</footer>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>

</body>

</html>