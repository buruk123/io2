<?php
@session_start();
@$isLoggedIn = $_SESSION['isLoggedIn'];
@$isAdmin = $_SESSION['isAdmin'];
@$isMod = $_SESSION['isMod'];

?>

<script src="https://kit.fontawesome.com/28fdb5c183.js" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<link rel="stylesheet" href="sitestyle.css">
<div class="menufixer"></div>
<header>
    <nav class="navbar navbarfixed navbar-right navbar-expand-lg navbar-dark bg-dark" id="header">
        <div class="container" style="height: 100px;">
            <a class="navbar-brand" href="index.php"><img src="resources/images/LOGO.PNG" width="100"
                                                          height="100" alt="Najlepszy bank!!!"></a>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <img src="resources/images/logonapis.png" height="100" width="600">
                <ul class="navbar-nav" style="margin-left: 20px;">
                    <li class="nav-item">
                        <div class="input-group-append">
                            <ul class="navbar-nav mr-auto">
                                <?php if ($isLoggedIn): ?>
                                <li class="nav-item">
                                    <?php if ($isAdmin): ?>
                                        <a class="nav-link"
                                           href="panel_uzytkownika.php"><?php echo $_SESSION['imie'] . ' ' . $_SESSION['nazwisko'] ?></a>
                                        <a class="nav-link" href="panel_administratora.php">[ADMIN]</a>
                                    <?php elseif ($isMod): ?>
                                        <a class="nav-link"
                                           href="panel_uzytkownika.php"><?php echo $_SESSION['imie'] . ' ' . $_SESSION['nazwisko'] ?></a>
                                        <a class="nav-link" href="panel_moderatora.php">[MOD]</a>
                                    <?php else: ?>
                                        <a class="nav-link"
                                           href="panel_uzytkownika.php"><?php echo $_SESSION['imie'] . ' ' . $_SESSION['nazwisko'] ?></a>
                                    <?php endif; ?>
                                </li>
                            </ul>
                    <li class="nav-item">
                        <a class="nav-link" href="logout.php">Wyloguj się</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="koszyk.php">Twój koszyk</a>
                    </li>
                    <?php else: ?>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                           data-toggle="dropdown" aria-haspopup="false" aria-expanded="false">
                            Zaloguj się
                        </a>
                        <form class="dropdown-menu p-4 width-repaired" action="login.php" method="post">
                            <div class="form-group">
                                <label for="exampleDropdownFormEmail2">Email address</label>
                                <input type="email" name="login" class="form-control" id="exampleDropdownFormEmail2"
                                       placeholder="email@example.com">
                            </div>
                            <div class="form-group">
                                <label for="exampleDropdownFormPassword2">Password</label>
                                <input type="password" name="password" class="form-control"
                                       id="exampleDropdownFormPassword2" placeholder="Password">
                            </div>
                            <button type="submit" class="btn btn-primary">Sign in</button>
                        </form>
                    </li>
                </ul>
            </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="rejestracja.php">Zarejestruj się</a>
            </li>
            <?php endif; ?>
            </ul>
        </div>
        </div>
    </nav>
</header>

<ul class="nav justify-content-center bg-warning margin-custom-bottom">
    <li class="nav-item">
        <a class="nav-link btn-warning" href="produkty.php?rodzaj=LAPTOP" role="button"
           aria-haspopup="true"
           aria-expanded="false">Laptopy</a>
    </li>
    <li class="nav-item">
        <a class="nav-link btn-warning" href="produkty.php?rodzaj=KOMPUTER" role="button"
           aria-haspopup="true"
           aria-expanded="false">Komputery</a>
    </li>
    <li class="nav-item">
        <a class="nav-link btn-warning" href="produkty.php?rodzaj=TELEFON" role="button"
           aria-haspopup="true"
           aria-expanded="false">Telefony</a>
    </li>
    <li class="nav-item">
        <a class="nav-link btn-warning" href="produkty.php?rodzaj=PODZESPOŁY" role="button"
           aria-haspopup="true"
           aria-expanded="false">Podzespoły komputerowe</a>
    </li>
    <li class="nav-item">
        <a class="nav-link btn-warning" href="produkty.php?rodzaj=PERYFERIA" role="button"
           aria-haspopup="true"
           aria-expanded="false">Urządzenia peryferyjne</a>
    </li>
    <li class="nav-item">
        <a class="nav-link btn-warning" href="produkty.php?rodzaj=OPROGRAMOWANIE" role="button"
           aria-haspopup="true"
           aria-expanded="false">Oprogramowanie</a>
    </li>
</ul>

<script type="text/javascript">
    function clicked(e) {
        document.getElementById("clickedd").innerText = e.text
    }
</script>

