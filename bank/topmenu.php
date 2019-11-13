<?php
@session_start();
@$isLoggedIn = $_SESSION['isLoggedIn'];
@$isAdmin = $_SESSION['isAdmin'];

?>

<script src="https://kit.fontawesome.com/28fdb5c183.js" crossorigin="anonymous"></script>
<link rel="stylesheet" href="sitestyle.css">
<div class="menufixer"></div>
<header>
    <nav class="navbar navbarfixed navbar-right navbar-expand-lg navbar-dark bg-dark" id="header">
        <div class="container" style="height: 100px;">
            <a class="navbar-brand" href="index.php"><img src="resources/images/squirrellaptopfixed.png" width="150" height="150" alt="Najlepszy bank!!!"></a>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <div class="p-2 bg-light rounded rounded-pill shadow-sm w-50 col-xl-7">
                    <div class="input-group">
                        <div class="input-group-append">
                            <button id="button-addon1" type="submit" class="btn btn-link text-primary"><i class="fa fa-search"></i></button>
                        </div>
                        <input type="search" placeholder="Czego szukasz?" aria-describedby="button-addon1" class="form-control border-0 bg-light">
                        <div class="input-group-append">
                            <ul class="navbar-nav mr-auto">
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle text-secondary" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Wszystkie kategorie
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="#">Action</a>
                                        <a class="dropdown-item" href="#">Another action</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="#">Something else here</a>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <div class="input-group-append">
                            <ul class="navbar-nav mr-auto">
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="false" aria-expanded="false">
                                        Zaloguj się
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="#">Action</a>
                                        <a class="dropdown-item" href="#">Another action</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="#">Something else here</a>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="register.php">Zarejestruj się</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Twój koszyk</a></i>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>



