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
        <h1 class="my-4">Karty płatnicze</h1>
        <div class="accordion" id="accordionExample">
            <div class="row">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header" id="headingOne">
                            <div class="text-center form-text-custom">
                                <img src="resources/images/kartagold.jpg" class="d-block w-50 cardsimages"
                                    alt="Karta gold">
                            </div>
                            <div>
                                Karta <b>GOLD VIP</b> zapewnia jeszcze większą swobodę finansową, jest akceptowana na
                                całym
                                świecie. Dzięki specjalnie skonstruowanej ofercie, to doskonały towarzysz w czasie
                                podróży.
                            </div>
                            <h2 class="mb-0">
                                <button class="btn btn-link collapsed btn-dark" type="button" data-toggle="collapse"
                                    data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    <b style="color: red;">Zobacz więcej</b>
                                </button>
                            </h2>
                        </div>

                        <div id="collapseOne" class="collapse" aria-labelledby="headingOne"
                            data-parent="#accordionExample">
                            <div class="card-body">
                                <ul>
                                    <li>5% zwrotu kosztów za paliwo</li>
                                    <li>0 zł za wypłaty ze wszystkich bankomatów na świecie</li>
                                    <li>Zwrot opłaty za kartę jeśli wykonasz transakcję kartą za 1 000 zł w miesiącu
                                    </li>
                                    <li>Szeroki zakres ubezpieczenia m.in.: koszty leczenia, utrata bagażu</li>
                                    <li>Opłata za kartę 250 zł</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header" id="headingTwo">
                            <div class="text-center form-text-custom">
                                <img src="resources/images/kartaplatinum.png" class="d-block w-50 cardsimages"
                                    alt="Karta platinum">
                            </div>
                            <div>
                                Karta platinum to doskonałe narzędzie płatnicze dla użytkowników kart segmentu Premium,
                                którzy wyjątkowych dodatkowych korzyści oraz znakomitej obsługi.
                            </div>
                            <h2 class="mb-0">
                                <button class="btn btn-link collapsed btn-dark" type="button" data-toggle="collapse"
                                    data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                    <b style="color: red;">Zobacz więcej</b>
                                </button>
                            </h2>
                        </div>
                        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo"
                            data-parent="#accordionExample">
                            <div class="card-body">
                                <ul>
                                    <li>Okazja na prezenty i nagrody w Programie <b>Honor</b></li>
                                    <li>Bogaty pakiet ubezpieczeń w kraju i za granicą</li>
                                    <li>Ochrona kupowanych produktów przed utratą, kradzieżą lub zniszczeniem do 90 dni
                                        od
                                        dnia zakupu
                                    </li>
                                    <li>Opłata za kartę 500 zł</li>
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
                                <img src="resources/images/kartasilver.png" class="d-block w-50 cardsimages"
                                    alt="Karta silver">
                            </div>
                            <div>
                                Dzięki karcie Silver zyskujesz większą elastyczność finansową dzięki akceptacji na całym
                                świecie. Możesz teraz bardziej kontrolować swoje wydatki.
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
                                    <li>W przypadku gdy zgubisz swoją kartę albo zostanie ona skradziona, dostaniesz
                                        natychmiastową pomoc w jej zablokowaniu i wymianie
                                    </li>
                                    <li>Ochrona przed nieautoryzowanymi transakcjami
                                    </li>
                                    <li>0 zł za wpłaty i wypłaty ze wszystkich bankomatów w Polsce</li>
                                    <li>Opłata za kartę 100 zł</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header" id="headingFour">
                            <div class="text-center form-text-custom">
                                <img src="resources/images/kartazwykla.png" class="d-block w-50 cardsimages"
                                    alt="Karta codzienna">
                            </div>
                            <div>
                                Wystarczy zasilić ją środkami, by móc używać jej do płacenia za wszystko, za co na co
                                dzień
                                płacimy gotówką - zakupy czy też rachunki
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
                                    <li>Do 750 zł za zakupy u naszych partnerów</li>
                                    <li>0 zł za użykowanie karty, jeśli co najmniej raz w miesiącu zapłacisz kartą za
                                        zakupy
                                    </li>
                                    <li>0 zł za wpłaty i wypłaty z bankomatów Nasz Bank</li>
                                    <li>Brak opłat za kartę</li>
                                </ul>
                            </div>
                        </div>
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
                <a href="#"><img src="resources/images/instagram.png" alt="instagram" style="width: 50px; height: 50px;"></a>
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