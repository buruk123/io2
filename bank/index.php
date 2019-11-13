<!DOCTYPE html>
<html lang="pl" xmlns="http://www.w3.org/1999/html">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>BANK</title>
    <meta name="description" content="Projekt banku">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="sitestyle.css">
</head>
<body>
<?php require_once('topmenu.php') ?>
<div class="bd-example">
    <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
            <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
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
        <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
</div>

<!--TODO: MENU-->

<div class="container">

    <h2 class="my-4">Wiadomości</h2>

    <!-- Marketing Icons Section -->
    <div class="row">
        <div class="col-lg-4 mb-4">
            <div class="card h-100">
                <h4 class="card-header"><b>Przerwa 06.06</b></h4>
                <div class="card-body">
                    <p class="card-text">Informujemy, że w dniu 06 czerwca nastąpi tymczasowa przerwa w działaniu
                        banku
                        w związku z przeprowadzaną konserwacją. Za wszystkie nieugodnienia przepraszamy.</p>
                </div>
            </div>
        </div>
        <div class="col-lg-4 mb-4">
            <div class="card h-100">
                <h4 class="card-header"><b>Nasz Bank bankiem roku według magazynu "The Money"</b></h4>
                <div class="card-body">
                    <p class="card-text">Nasz Bank otrzymał tytuł <q>Bank of the Year in Poland</q> w jednym z
                        najbardziej prestiżowych konkursów branżowych, organizowanym przez magazyn <q>The Money</q>.
                        Nagroda potwiedza silną pozycję banku oraz sukces strategicznych projektów zrealizowanych
                        przez
                        Nasz Bank.</p>
                </div>
            </div>
        </div>
        <div class="col-lg-4 mb-4">
            <div class="card h-100">
                <h4 class="card-header"><b>Nowe <q>Konto Diamond</q></b></h4>
                <div class="card-body">
                    <p class="card-text"><q>Konto Diamond</q> zostało stworzone z myślą zarówno o małych, średnich
                        jak i
                        dużych przedsiębiorcach. Uruchomiliśmy wraz z tym kontem <b>Private Banking</b>, który ma za
                        zadanie pomoc właścicielowi konta w zakresie usług bankowych, inwestycyjnych i kredytowych.
                    </p>
                </div>
            </div>
        </div>
    </div>
    <!-- /.row -->

    <!-- Portfolio Section -->
    <h2>Zarząd</h2>

    <div class="row">
        <div class="col-lg-4 col-sm-6 portfolio-item">
            <div class="card h-100">
                <a href="#"><img class="card-img-top" src="resources/images/ekipa1.jpg" alt="Prezes"></a>
                <div class="card-body">
                    <h4 class="card-title">Andrzej Waligóra</h4>
                    <p class="card-text">Prezes Zarządu Banku Nasz Bank.</p>
                    <p>Kieruje bieżącą działalnością Banku i pracami Zarządu Banku. Reprezentuje Zarząd Banku wobec
                        osób
                        trzecich. Sprawuje ogólny nadzór nad jednostkami organizacyjnymi Banku. Nadzoruje Obszar
                        Zarządzania Bankiem, w tym sprawuje nadzór nad ryzykiem braku zgodności działalności Banku z
                        przepisami prawa, regulacjami wewnętrznymi i standardami rynkowymi.</p>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-sm-6 portfolio-item">
            <div class="card h-100">
                <a href="#"><img class="card-img-top" src="resources/images/ekipa2.jpg" alt="Wiceprezes"></a>
                <div class="card-body">
                    <h4 class="card-title">
                        Janusz Kowalski
                    </h4>
                    <p class="card-text">Wiceprezes Zarządu Banku.</p>
                    <p>Nadzoruje Obszar Finansów, w tym Pion Rachunkowości Finansowej, Biuro Zarządzania Jakością
                        Danych
                        i Kontroli Operacyjnej Obszaru Rachunkowości, Departament Podatkowy, Pion Zarządzania
                        Aktywami i
                        Pasywami, Pion Rachunkowości Zarządczej i Relacji Inwestorskich.</p>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-sm-6 portfolio-item">
            <div class="card h-100">
                <a href="#"><img class="card-img-top" src="resources/images/ekipa3.jpg" alt="Wiceprezes"></a>
                <div class="card-body">
                    <h4 class="card-title">
                        Michał Poziomka
                    </h4>
                    <p class="card-text">Wiceprezes Zarządu Banku.</p>
                    <p>Nadzoruje Obszar Strategii i Transformacji Banku, w tym Pion Transformacji Cyfrowej,
                        Departament
                        Innowacji, Biuro Koordynacji Projektu Petrus.</p>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-sm-6 portfolio-item">
            <div class="card h-100">
                <a href="#"><img class="card-img-top" src="resources/images/ekipa4.jpg" alt="Wiceprezes"></a>
                <div class="card-body">
                    <h4 class="card-title">
                        Wacław Stolarski
                    </h4>
                    <p class="card-text">Wiceprezes Zarządu Banku.</p>
                    <p>Nadzoruje Obszar Bankowości Personal Finance, w tym Pion Sprzedaży Consumer Finance, Pion
                        Marketingu i Rozwoju PF, Departament Planowania i Finansów PF, Pion Sprzedaży PF, Pion
                        Operacji
                        PF.</p>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-sm-6 portfolio-item">
            <div class="card h-100">
                <a href="#"><img class="card-img-top" src="resources/images/ekipa5.jpg" alt="Wiceprezes"></a>
                <div class="card-body">
                    <h4 class="card-title">
                        Szymon Kamiński
                    </h4>
                    <p class="card-text">Wiceprezes Zarządu Banku.</p>
                    <p>Nadzoruje obszar Bankowości CIB, w tym Pion Rynków Finansowych, Departament Klientów
                        Strategicznych CIB, Departament Wsparcia CIB.</p>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-sm-6 portfolio-item">
            <div class="card h-100">
                <a href="#"><img class="card-img-top" src="resources/images/ekipa6.jpg" alt="Wiceprezes"></a>
                <div class="card-body">
                    <h4 class="card-title">
                        Tomasz Tryta
                    </h4>
                    <p class="card-text">Wiceprezes Zarządu Banku.</p>
                    <p>Nadzoruje Obszar Bankowości Detalicznej i Biznesowej, w tym Departament Zarządzania
                        Sprzedażą,
                        Pion Klientów Detalicznych i Biznesowych, Departament Decyzji Kredytowych, Departament
                        Planowania Bankowości Detalicznej, Pion Bankowości Internetowej, Departament Bankowości
                        Prywatnej, Departament Jakości i Projektów Bankowości Detalicznej, Biuro Maklerskie.</p>
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
            <a href="#"><img src="resources/images/facebook.png" alt="facebook" style="width: 50px; height: 50px;"></a>
            <a href="#"><img src="resources/images/twitter.png" alt="twitter" style="width: 50px; height: 50px;"></a>
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
<script>
    function fixHeight() {
        let height = document.getElementById("header").clientHeight;
        document.getElementById("menufixer").style.height = height.toString()
    }
</script>
</body>

</html>