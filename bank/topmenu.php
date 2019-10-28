<?php
@session_start();
@$isLoggedIn = $_SESSION['isLoggedIn'];
@$isAdmin = $_SESSION['isAdmin'];

?>

<header>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="index.php"><img src="resources/images/logo.png" alt="Najlepszy bank!!!"></a>
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse"
                    data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false"
                    aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="kontaosobiste.php">Konta osobiste</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="kredyty.php">Kredyty</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="karty.php">Karty płatnicze</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="kontakt.php">Kontakt</a>
                    </li>
                    <?php if ($isLoggedIn == true && $isAdmin == false): ?>
                    <li class="nav-item">
                        <a class="nav-link logincreate" href="user.php"><b><?php echo $_SESSION['imie'].' '. $_SESSION['nazwisko'] ?></b></a>
                    </li>
                    <li class="nav-item create">
                        <a class="nav-link logincreate" href="logout.php"><b>Wyloguj się</b></a>
                    </li>
                    <?php elseif ($isLoggedIn == true && $isAdmin == true) :?>
                    <li class="nav-item">
                        <a class="nav-link logincreate" href="admin.php"><b><?php echo $_SESSION['imie'].' '. $_SESSION['nazwisko'] ?></b></a>
                    </li>
                    <li class="nav-item create">
                        <a class="nav-link logincreate" href="logout.php"><b>Wyloguj się</b></a>
                    </li>
                    <?php else:?>
                    <li class="nav-item">
                        <a class="nav-link logincreate" href="login.php"><b>Zaloguj się</b></a>
                    </li>
                    <li class="nav-item create">
                        <a class="nav-link logincreate" href="register.php"><b>Zarejestruj się</b></a>
                    </li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </nav>
</header>

