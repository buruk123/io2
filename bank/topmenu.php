<?php
@session_start();
@$isLoggedIn = $_SESSION['isLoggedIn'];
@$isAdmin = $_SESSION['isAdmin'];

?>

<script src="https://kit.fontawesome.com/28fdb5c183.js" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<link rel="stylesheet" href="sitestyle.css">
<div class="menufixer"></div>
<header>
    <nav class="navbar navbarfixed navbar-right navbar-expand-lg navbar-dark bg-dark" id="header">
        <div class="container" style="height: 100px;">
            <a class="navbar-brand" href="index.php"><img src="resources/images/squirrellaptopfixed.png" width="100"
                                                          height="100" alt="Najlepszy bank!!!"></a>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <div class="p-2 bg-light rounded rounded-pill shadow-sm w-100 col-xl-8 col-lg-7">
                    <div class="input-group">
                        <div class="input-group-append">
                            <button id="button-addon1" type="submit" class="btn btn-link text-primary"><i
                                        class="fa fa-search"></i></button>
                        </div>
                        <input type="search" placeholder="Czego szukasz?" aria-describedby="button-addon1"
                               class="form-control border-0 bg-light">
                        <div class="input-group-append">
                            <ul class="navbar-nav mr-auto">
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle text-secondary" id="clickedd" href="#"
                                       id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true"
                                       aria-expanded="false">
                                        Wybierz element
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" onclick="clicked(this)" href="#">Laptopy</a>
                                        <a class="dropdown-item" onclick="clicked(this)" href="#">Komputery</a>
                                        <a class="dropdown-item" onclick="clicked(this)" href="#">Telefony</a>
                                        <a class="dropdown-item" onclick="clicked(this)" href="#">Podzespoły komputerowe</a>
                                        <a class="dropdown-item" onclick="clicked(this)" href="#">Urządzenia peryferyjne</a>
                                        <a class="dropdown-item" onclick="clicked(this)" href="#">Oprogramowanie</a>
                                        <a class="dropdown-item" onclick="clicked(this)" href="#">Gaming</a>
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
                                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                       data-toggle="dropdown" aria-haspopup="false" aria-expanded="false">
                                        Zaloguj się
                                    </a>
                                    <form class="dropdown-menu p-4 width-repaired">
                                        <div class="form-group">
                                            <label for="exampleDropdownFormEmail2">Email address</label>
                                            <input type="email" class="form-control" id="exampleDropdownFormEmail2"
                                                   placeholder="email@example.com">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleDropdownFormPassword2">Password</label>
                                            <input type="password" class="form-control"
                                                   id="exampleDropdownFormPassword2" placeholder="Password">
                                        </div>
                                        <button type="submit" class="btn btn-primary">Sign in</button>
                                    </form>
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

<ul class="nav justify-content-center bg-warning margin-custom-bottom   ">
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle btn-warning" data-toggle="dropdown" href="#" role="button" aria-haspopup="true"
           aria-expanded="false">Laptopy</a>
        <div class="dropdown-menu">
            <a class="dropdown-item" href="#">Action</a>
            <a class="dropdown-item" href="#">Another action</a>
            <a class="dropdown-item" href="#">Something else here</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">Separated link</a>
        </div>
    </li>
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle btn-warning" data-toggle="dropdown" href="#" role="button" aria-haspopup="true"
           aria-expanded="false">Komputery</a>
        <div class="dropdown-menu">
            <a class="dropdown-item" href="#">Action</a>
            <a class="dropdown-item" href="#">Another action</a>
            <a class="dropdown-item" href="#">Something else here</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">Separated link</a>
        </div>
    </li>
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle btn-warning" data-toggle="dropdown" href="#" role="button" aria-haspopup="true"
           aria-expanded="false">Telefony</a>
        <div class="dropdown-menu">
            <a class="dropdown-item" href="#">Action</a>
            <a class="dropdown-item" href="#">Another action</a>
            <a class="dropdown-item" href="#">Something else here</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">Separated link</a>
        </div>
    </li>
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle btn-warning" data-toggle="dropdown" href="#" role="button" aria-haspopup="true"
           aria-expanded="false">Podzespoły komputerowe</a>
        <div class="dropdown-menu">
            <a class="dropdown-item" href="#">Action</a>
            <a class="dropdown-item" href="#">Another action</a>
            <a class="dropdown-item" href="#">Something else here</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">Separated link</a>
        </div>
    </li>
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle btn-warning" data-toggle="dropdown" href="#" role="button" aria-haspopup="true"
           aria-expanded="false">Urządzenia peryferyjne</a>
        <div class="dropdown-menu">
            <a class="dropdown-item" href="#">Action</a>
            <a class="dropdown-item" href="#">Another action</a>
            <a class="dropdown-item" href="#">Something else here</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">Separated link</a>
        </div>
    </li>
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle btn-warning" data-toggle="dropdown" href="#" role="button" aria-haspopup="true"
           aria-expanded="false">Oprogramowanie</a>
        <div class="dropdown-menu">
            <a class="dropdown-item" href="#">Action</a>
            <a class="dropdown-item" href="#">Another action</a>
            <a class="dropdown-item" href="#">Something else here</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">Separated link</a>
        </div>
    </li>
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle btn-warning" data-toggle="dropdown" href="#" role="button" aria-haspopup="true"
           aria-expanded="false">Gaming</a>
        <div class="dropdown-menu">
            <a class="dropdown-item" href="#">Action</a>
            <a class="dropdown-item" href="#">Another action</a>
            <a class="dropdown-item" href="#">Something else here</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">Separated link</a>
        </div>
    </li>
</ul>

<script type="text/javascript">
    function clicked(e) {
        document.getElementById("clickedd").innerText = e.text
    }
</script>

