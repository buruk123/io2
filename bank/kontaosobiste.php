<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>BANK</title>
    <meta name="description" content="Projekt banku">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>

<body>
<?php require_once ('topmenu.php')?>
<div class="container">

    <h1 class="my-4">Konta Osobiste</h1>


    <div class="accordion" id="accordionExample">
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header" id="headingOne">
                        <div class="text-center form-text-custom">
                            <p>Konto dla młodych</p>
                        </div>
                        <div>
                            Konto dla młodych jest idealnym wyborem dla ludzi pomiędzy 18 a 26 rokiem życia. Od wielu
                            lat nasze
                            konto zajmuje 1 miejsce w rankingu <b>Najlepszych Kont Dla Młodych</b>.
                        </div>
                        <h2 class="mb-0">
                            <button class="btn btn-link collapsed btn-dark" type="button" data-toggle="collapse"
                                    data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                <b style="color: red;">Zobacz więcej</b>
                            </button>
                        </h2>
                    </div>

                    <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                        <div class="card-body">
                            <ul>
                                <li>200 zł premii dla nowych klientów</li>
                                <li>0 zł za prowadzenie konta</li>
                                <li>0 zł za wszystkie przelewy</li>
                                <li>Płatności BLIK, GooglePay, ApplePay</li>
                                <li>Zwrot za rachunki w wysokości 1% za prąd, gaz, internet, telefon, TV</li>
                                <li>Systematycznie rosnące oszczędności dzięki <b>Automatycznemu oszczędzaniu</b></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header" id="headingTwo">
                        <div class="text-center form-text-custom">
                            <p>Twoje konto</p>
                        </div>
                        <div>
                            <q>Twoje konto</q> to najlepszy wybór spośród kont osobistych na rynku. Oferujemy wysokie
                            oprotentowanie, darmowe prowadzenie konta i wiele innych! Sprawdź poniżej.
                        </div>
                        <h2 class="mb-0">
                            <button class="btn btn-link collapsed btn-dark" type="button" data-toggle="collapse"
                                    data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                <b style="color: red;">Zobacz więcej</b>
                            </button>
                        </h2>
                    </div>
                    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                        <div class="card-body">
                            <ul>
                                <li><b>2,7%</b> w skali roku</li>
                                <li>0 zł za prowadzenie konta</li>
                                <li>0 zł za przelewy internetowe</li>
                                <li>Płatności BLIK, GooglePay, ApplePay</li>
                                <li>Zwrot za rachunki w wysokości 5% za prąd, gaz, internet, telefon, TV</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header" id="headingThree">
                        <div class="text-center form-text-custom">
                            <p>Konto Max walutowe</p>
                        </div>
                        <div>
                            Dzięki <q>Konto Max walutowe</q> możesz mieć dostęp do konta w dowolnym miejscu i czasie
                            przez internet,
                            SMS i telefon komórkowy. Idealne rozwiązanie dla podróżujących.
                        </div>
                        <h2 class="mb-0">
                            <button class="btn btn-link collapsed btn-dark" type="button" data-toggle="collapse"
                                    data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                <b style="color: red;">Zobacz więcej</b>
                            </button>
                        </h2>
                    </div>
                    <div id="collapseThree" class="collapse" aria-labelledby="headingThree"
                         data-parent="#accordionExample">
                        <div class="card-body">
                            <ul>
                                <li>Brak kosztów przewalutowania</li>
                                <li>Dostęp do konta w dowolnym miejscu i czasie przez internet, SMS i telefon
                                    komórkowy
                                </li>
                                <li>Możliwość otrzymywania wypłaty w dowolnej walucie</li>
                                <li>Możliwość wymiany waluty w naszym kantorze</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header" id="headingFour">
                        <div class="text-center form-text-custom">
                            <p>Konto Diamond</p>
                        </div>
                        <div>
                            <q>Konto Diamond</q> to prestiżowy rachunek osobisty zaprojektowany z myslą o codziennych
                            potrzebach
                            przedsiębiorców. Dlatego zarządzanie kontem może być proste.
                        </div>
                        <h2 class="mb-0">
                            <button class="btn btn-link collapsed btn-dark" type="button" data-toggle="collapse"
                                    data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                <b style="color: red;">Zobacz więcej</b>
                            </button>
                        </h2>
                    </div>
                    <div id="collapseFour" class="collapse" aria-labelledby="headingFour"
                         data-parent="#accordionExample">
                        <div class="card-body">
                            <ul>
                                <li>150 zł za prowadzenie konta</li>
                                <li>Brak opłaty we wszystkich bankomatach w kraju i na świecie</li>
                                <li>Profesjonalne wsparcie doradcy bankowego</li>
                                <li>Płatności BLIK, GooglePay, ApplePay, GarminPay, Fitbit Pay, MasterPass, Visa
                                    Checkout
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <h2>Polecane karty</h2>

    <div class="bd-example">
        <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner carousel-custom">
                <div class="carousel-item active">
                    <img src="resources/images/kartagold.jpg" class="d-block w-100" alt="Karta gold">
                </div>
                <div class="carousel-item">
                    <img src="resources/images/kartaplatinum.png" class="d-block w-100" alt="Karta platinum">
                </div>
                <div class="carousel-item">
                    <img src="resources/images/kartazwykla.png" class="d-block w-100" alt="Karta gold">
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

</body>

</html>