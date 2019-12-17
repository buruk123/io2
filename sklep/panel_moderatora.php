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
    <link rel="stylesheet" href="sitestyle.css">
    <script src="ckeditor/ckeditor.js"></script>
    <script type="text/javascript">
        function editor(id) {
            CKEDITOR.replace(id);
        }
    </script>

</head>
<body>
<?php
session_start();
@$isLoggedIn = $_SESSION['isLoggedIn'];
@$isAdmin = $_SESSION['isAdmin'];
@$isMod = $_SESSION['isMod'];
if (!$isMod) {
    header("Location: index.php");
}
require_once "connect.php";
?>

<?php require_once('topmenu.php') ?>
<div class="container content">
    <div class="row">
        <div class="col-md-2">
            <div class="btn-group-vertical btn-block">
                <button type="button" class="btn btn-warning" data-toggle="collapse" aria-expanded="true"
                        aria-controls="collapseOne" data-target="#collapseOne">Dodaj przedmiot
                </button>
                <button type="button" class="btn btn-warning" data-toggle="collapse" aria-expanded="true"
                        aria-controls="collapseTwo" data-target="#collapseTwo">Usuń przedmiot
                </button>
                <button type="button" class="btn btn-warning" data-toggle="collapse" aria-expanded="true"
                        aria-controls="collapseThree" data-target="#collapseThree">Dodaj artykuł
                </button>
                <button type="button" class="btn btn-warning" data-toggle="collapse" aria-expanded="true"
                        aria-controls="collapseFour" data-target="#collapseFour">Usuń użytkownika
                </button>

            </div>
        </div>
        <div class="col-md-10">
            <div class="accordion" id="accordionExample">
                <div class="card">
                    <div class="card-header" id="headingOne">
                        <div class="text-center form-text-custom">
                            <p>Dodaj przedmiot</p>
                        </div>
                    </div>
                    <div id="collapseOne" class="collapse" aria-labelledby="headingOne"
                         data-parent="#accordionExample">
                        <div class="card-body">
                            <div class="accordion" id="accordionExample2">
                                <div class="card">
                                    <div class="card-header" id="headingOne">
                                        <ul class="nav justify-content-center">
                                            <li class="nav-item">
                                                <a class="nav-link" data-toggle="collapse" aria-expanded="true"
                                                   aria-controls="collapseOneOne" data-target="#collapseOneOne"
                                                   href="#">Laptopy</a>
                                            </li>
                                            <li class="nav-item" data-toggle="collapse" aria-expanded="true"
                                                aria-controls="collapseOneTwo" data-target="#collapseOneTwo">
                                                <a class="nav-link" href="#">Komputery</a>
                                            </li>
                                            <li class="nav-item" data-toggle="collapse" aria-expanded="true"
                                                aria-controls="collapseOneThree" data-target="#collapseOneThree">
                                                <a class="nav-link" href="#">Telefony</a>
                                            </li>
                                            <li class="nav-item" data-toggle="collapse" aria-expanded="true"
                                                aria-controls="collapseOneFour" data-target="#collapseOneFour">
                                                <a class="nav-link" href="#">Podzespoły komputerowe</a>
                                            </li>
                                            <li class="nav-item" data-toggle="collapse" aria-expanded="true"
                                                aria-controls="collapseOneFive" data-target="#collapseOneFive">
                                                <a class="nav-link" href="#">Urządzenia peryferyjne</a>
                                            </li>
                                            <li class="nav-item" data-toggle="collapse" aria-expanded="true"
                                                aria-controls="collapseOneSix" data-target="#collapseOneSix">
                                                <a class="nav-link" href="#">Oprogramowanie</a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div id="collapseOneOne" class="collapse" aria-labelledby="headingOneOne"
                                         data-parent="#accordionExample2">
                                        <div class="card-body">
                                            <form action="dodaj_przedmiot.php" method="post"
                                                  enctype="multipart/form-data">
                                                <div class="form-group">
                                                    <input type="hidden" name="typ" class="form-control" id="typ"
                                                           value="LAPTOP">
                                                </div>
                                                <div class="form-group">
                                                    <label for="marka">Marka</label>
                                                    <input type="text" name="marka" class="form-control" id="marka">
                                                </div>
                                                <div class="form-group">
                                                    <label for="model">Model</label>
                                                    <input type="text" name="model" class="form-control" id="model">
                                                </div>
                                                <div class="form-group">
                                                    <label for="processor">Procesor</label>
                                                    <input type="text" name="procesor" class="form-control"
                                                           id="processor">
                                                </div>
                                                <div class="form-group">
                                                    <label for="memory">Pamięć</label>
                                                    <input type="text" name="pamiec" class="form-control" id="memory">
                                                </div>
                                                <div class="form-group">
                                                    <label for="graphics">Grafika</label>
                                                    <input type="text" name="grafika" class="form-control"
                                                           id="graphics">
                                                </div>
                                                <div class="form-group">
                                                    <label for="myeditor">Opis</label>
                                                    <textarea id="myeditor" name="myeditor"></textarea>
                                                    <script>editor('myeditor')</script>
                                                </div>
                                                <div class="form-group">
                                                    <label for="cena">Cena</label>
                                                    <input type="number" name="cena" class="form-control" id="cena">
                                                </div>
                                                <div class="form-group">
                                                    <label for="photos">Zdjęcia</label>
                                                    <input type="file" name="photos" class="form-control-file"
                                                           id="photos">
                                                </div>
                                                <button type="submit" class="btn btn-warning">Submit</button>
                                            </form>
                                        </div>
                                    </div>
                                    <div id="collapseOneTwo" class="collapse" aria-labelledby="headingOneTwo"
                                         data-parent="#accordionExample2">
                                        <div class="card-body">
                                            <form action="dodaj_przedmiot.php" method="post"
                                                  enctype="multipart/form-data">
                                                <div class="form-group">
                                                    <input type="hidden" name="typ" class="form-control" id="typ"
                                                           value="KOMPUTER">
                                                </div>
                                                <div class="form-group">
                                                    <label for="marka">Marka</label>
                                                    <input type="text" name="marka" class="form-control" id="marka">
                                                </div>
                                                <div class="form-group">
                                                    <label for="marka">Model</label>
                                                    <input type="text" name="model" class="form-control" id="model">
                                                </div>
                                                <div class="form-group">
                                                    <label for="marka">Pamięć</label>
                                                    <input type="text" name="pamiec" class="form-control" id="pamiec">
                                                </div>
                                                <div class="form-group">
                                                    <label for="grafika">Grafika</label>
                                                    <input type="text" name="grafika" class="form-control" id="grafika">
                                                </div>
                                                <div class="form-group">
                                                    <label for="marka">System</label>
                                                    <input type="text" name="system" class="form-control" id="system">
                                                </div>
                                                <div class="form-group">
                                                    <label for="myeditor">Opis</label>
                                                    <textarea id="myeditor2" name="myeditor"></textarea>
                                                    <script>editor('myeditor2')</script>
                                                </div>
                                                <div class="form-group">
                                                    <label for="cena">Cena</label>
                                                    <input type="number" name="cena" class="form-control" id="cena">
                                                </div>
                                                <div class="form-group">
                                                    <label for="photos">Zdjęcia</label>
                                                    <input type="file" name="photos" class="form-control-file"
                                                           id="photos">
                                                </div>
                                                <button type="submit" class="btn btn-warning">Submit</button>
                                            </form>
                                        </div>
                                    </div>
                                    <div id="collapseOneThree" class="collapse" aria-labelledby="headingOneThree"
                                         data-parent="#accordionExample2">
                                        <div class="card-body">
                                            <form action="dodaj_przedmiot.php" method="post"
                                                  enctype="multipart/form-data">
                                                <div class="form-group">
                                                    <input type="hidden" name="typ" class="form-control" id="typ"
                                                           value="TELEFON">
                                                </div>
                                                <div class="form-group">
                                                    <label for="marka">Marka</label>
                                                    <input type="text" name="marka" class="form-control" id="marka">
                                                </div>
                                                <div class="form-group">
                                                    <label for="model">Model</label>
                                                    <input type="text" name="model" class="form-control" id="model">
                                                </div>
                                                <div class="form-group">
                                                    <label for="ekran">Ekran</label>
                                                    <input type="text" name="ekran" class="form-control" id="ekran">
                                                </div>
                                                <div class="form-group">
                                                    <label for="system">System</label>
                                                    <input type="text" name="system" class="form-control" id="system">
                                                </div>
                                                <div class="form-group">
                                                    <label for="pamiec">Pamięć</label>
                                                    <input type="text" name="pamiec" class="form-control" id="pamiec">
                                                </div>
                                                <div class="form-group">
                                                    <label for="myeditor">Opis</label>
                                                    <textarea id="myeditor3" name="myeditor"></textarea>
                                                    <script>editor('myeditor3')</script>
                                                </div>
                                                <div class="form-group">
                                                    <label for="cena">Cena</label>
                                                    <input type="number" name="cena" class="form-control" id="cena">
                                                </div>
                                                <div class="form-group">
                                                    <label for="photos">Zdjęcia</label>
                                                    <input type="file" name="photos" class="form-control-file"
                                                           id="photos">
                                                </div>
                                                <button type="submit" class="btn btn-warning">Submit</button>
                                            </form>
                                        </div>
                                    </div>
                                    <div id="collapseOneFour" class="collapse" aria-labelledby="headingOneFour"
                                         data-parent="#accordionExample2">
                                        <div class="card-body">
                                            <div class="accordion" id="accordionExample3">
                                                <div class="card">
                                                    <div class="card-header" id="headingOne">
                                                        <ul class="nav justify-content-center">
                                                            <li class="nav-item">
                                                                <a class="nav-link" data-toggle="collapse"
                                                                   aria-expanded="true"
                                                                   aria-controls="collapseOneFourOne"
                                                                   data-target="#collapseOneFourOne"
                                                                   href="#">Dyski</a>
                                                                <a class="nav-link" data-toggle="collapse"
                                                                   aria-expanded="true"
                                                                   aria-controls="collapseOneFourTwo"
                                                                   data-target="#collapseOneFourTwo"
                                                                   href="#">Grafika</a>
                                                                <a class="nav-link" data-toggle="collapse"
                                                                   aria-expanded="true"
                                                                   aria-controls="collapseOneFourThree"
                                                                   data-target="#collapseOneFourThree"
                                                                   href="#">Procesory</a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div id="collapseOneFourOne" class="collapse"
                                                         aria-labelledby="headingOneFourOne"
                                                         data-parent="#accordionExample3">
                                                        <div class="card-body">
                                                            <form action="dodaj_przedmiot.php" method="post"
                                                                  enctype="multipart/form-data">
                                                                <div class="form-group">
                                                                    <input type="hidden" name="typ" class="form-control"
                                                                           id="typ"
                                                                           value="PODZESPOŁY">
                                                                    <input type="hidden" name="typ_podzespolu"
                                                                           class="form-control"
                                                                           id="typ"
                                                                           value="DYSKI">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="marka">Marka</label>
                                                                    <input type="text" name="marka" class="form-control"
                                                                           id="marka">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="model">Model</label>
                                                                    <input type="text" name="model" class="form-control"
                                                                           id="model">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="pojemnosc">Pojemność</label>
                                                                    <input type="text" name="pojemnosc"
                                                                           class="form-control"
                                                                           id="pojemnosc">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="interfejs">Interfejs</label>
                                                                    <input type="text" name="interfejs"
                                                                           class="form-control" id="interfejs">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="predkosci">Prędkości</label>
                                                                    <input type="text" name="predkosci"
                                                                           class="form-control"
                                                                           id="predkosci">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="myeditor">Opis</label>
                                                                    <textarea id="myeditor4" name="myeditor"></textarea>
                                                                    <script>editor('myeditor4')</script>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="cena">Cena</label>
                                                                    <input type="number" name="cena"
                                                                           class="form-control" id="cena">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="photos">Zdjęcia</label>
                                                                    <input type="file" name="photos"
                                                                           class="form-control-file"
                                                                           id="photos">
                                                                </div>
                                                                <button type="submit" class="btn btn-warning">Submit
                                                                </button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                    <div id="collapseOneFourTwo" class="collapse"
                                                         aria-labelledby="headingOneFourTwo"
                                                         data-parent="#accordionExample3">
                                                        <div class="card-body">
                                                            <form action="dodaj_przedmiot.php" method="post"
                                                                  enctype="multipart/form-data">
                                                                <div class="form-group">
                                                                    <input type="hidden" name="typ" class="form-control"
                                                                           id="typ"
                                                                           value="PODZESPOŁY">
                                                                    <input type="hidden" name="typ_podzespolu"
                                                                           class="form-control"
                                                                           id="typ"
                                                                           value="GRAFIKA">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="marka">Marka</label>
                                                                    <input type="text" name="marka" class="form-control"
                                                                           id="marka">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="model">Model</label>
                                                                    <input type="text" name="model" class="form-control"
                                                                           id="model">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="pamiec">Pamięć</label>
                                                                    <input type="text" name="pamiec"
                                                                           class="form-control"
                                                                           id="pamiec">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="rodzaj_pamieci">Rodzaj pamięci</label>
                                                                    <input type="text" name="rodzaj_pamieci"
                                                                           class="form-control" id="rodzaj_pamieci">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="zlacza">Złącza</label>
                                                                    <input type="text" name="zlacza"
                                                                           class="form-control"
                                                                           id="zlacza">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="myeditor">Opis</label>
                                                                    <textarea id="myeditor5" name="myeditor"></textarea>
                                                                    <script>editor('myeditor5')</script>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="cena">Cena</label>
                                                                    <input type="number" name="cena"
                                                                           class="form-control" id="cena">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="photos">Zdjęcia</label>
                                                                    <input type="file" name="photos"
                                                                           class="form-control-file"
                                                                           id="photos">
                                                                </div>
                                                                <button type="submit" class="btn btn-warning">Submit
                                                                </button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                    <div id="collapseOneFourThree" class="collapse"
                                                         aria-labelledby="headingOneFourThree"
                                                         data-parent="#accordionExample3">
                                                        <div class="card-body">
                                                            <form action="dodaj_przedmiot.php" method="post"
                                                                  enctype="multipart/form-data">
                                                                <div class="form-group">
                                                                    <input type="hidden" name="typ" class="form-control"
                                                                           id="typ"
                                                                           value="PODZESPOŁY">
                                                                    <input type="hidden" name="typ_podzespolu"
                                                                           class="form-control"
                                                                           id="typ"
                                                                           value="PROCESORY">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="marka">Marka</label>
                                                                    <input type="text" name="marka" class="form-control"
                                                                           id="marka">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="model">Model</label>
                                                                    <input type="text" name="model" class="form-control"
                                                                           id="model">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="seria">Seria</label>
                                                                    <input type="text" name="seria"
                                                                           class="form-control"
                                                                           id="seria">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="taktowanie">Taktowanie</label>
                                                                    <input type="text" name="taktowanie"
                                                                           class="form-control" id="taktowanie">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="liczba_rdzeni">Liczba rdzeni</label>
                                                                    <input type="text" name="liczba_rdzeni"
                                                                           class="form-control"
                                                                           id="liczba_rdzeni">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="myeditor">Opis</label>
                                                                    <textarea id="myeditor6" name="myeditor"></textarea>
                                                                    <script>editor('myeditor6')</script>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="cena">Cena</label>
                                                                    <input type="number" name="cena"
                                                                           class="form-control" id="cena">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="photos">Zdjęcia</label>
                                                                    <input type="file" name="photos"
                                                                           class="form-control-file"
                                                                           id="photos">
                                                                </div>
                                                                <button type="submit" class="btn btn-warning">Submit
                                                                </button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="collapseOneFive" class="collapse" aria-labelledby="headingOneFive"
                                         data-parent="#accordionExample2">
                                        <div class="card-body">
                                            <div class="accordion" id="accordionExample4">
                                                <div class="card">
                                                    <div class="card-header" id="headingOne">
                                                        <ul class="nav justify-content-center">
                                                            <li class="nav-item">
                                                                <a class="nav-link" data-toggle="collapse"
                                                                   aria-expanded="true"
                                                                   aria-controls="collapseOneFiveOne"
                                                                   data-target="#collapseOneFiveOne"
                                                                   href="#">Monitory</a>
                                                                <a class="nav-link" data-toggle="collapse"
                                                                   aria-expanded="true"
                                                                   aria-controls="collapseOneFiveTwo"
                                                                   data-target="#collapseOneFiveTwo"
                                                                   href="#">Myszki</a>
                                                                <a class="nav-link" data-toggle="collapse"
                                                                   aria-expanded="true"
                                                                   aria-controls="collapseOneFiveThree"
                                                                   data-target="#collapseOneFiveThree"
                                                                   href="#">Klawiatury</a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div id="collapseOneFiveOne" class="collapse"
                                                         aria-labelledby="headingOneFiveOne"
                                                         data-parent="#accordionExample4">
                                                        <div class="card-body">
                                                            <form action="dodaj_przedmiot.php" method="post"
                                                                  enctype="multipart/form-data">
                                                                <div class="form-group">
                                                                    <input type="hidden" name="typ" class="form-control"
                                                                           id="typ"
                                                                           value="PERYFERIA">
                                                                    <input type="hidden" name="typ_peryferii"
                                                                           class="form-control"
                                                                           id="typ"
                                                                           value="MONITORY">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="marka">Marka</label>
                                                                    <input type="text" name="marka" class="form-control"
                                                                           id="marka">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="model">Model</label>
                                                                    <input type="text" name="model" class="form-control"
                                                                           id="model">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="przekatna">Przekątna ekranu</label>
                                                                    <input type="text" name="przekatna"
                                                                           class="form-control"
                                                                           id="przekatna">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="rozdzielczosc">Rozdzielczość</label>
                                                                    <input type="text" name="rozdzielczosc"
                                                                           class="form-control" id="rozdzielczosc">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="matryca">Matryca</label>
                                                                    <input type="text" name="matryca"
                                                                           class="form-control"
                                                                           id="matryca">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="myeditor">Opis</label>
                                                                    <textarea id="myeditor7" name="myeditor"></textarea>
                                                                    <script>editor('myeditor7')</script>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="cena">Cena</label>
                                                                    <input type="number" name="cena"
                                                                           class="form-control" id="cena">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="photos">Zdjęcia</label>
                                                                    <input type="file" name="photos"
                                                                           class="form-control-file"
                                                                           id="photos">
                                                                </div>
                                                                <button type="submit" class="btn btn-warning">Submit
                                                                </button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                    <div id="collapseOneFiveTwo" class="collapse"
                                                         aria-labelledby="headingOneFiveTwo"
                                                         data-parent="#accordionExample4">
                                                        <div class="card-body">
                                                            <form action="dodaj_przedmiot.php" method="post"
                                                                  enctype="multipart/form-data">
                                                                <div class="form-group">
                                                                    <input type="hidden" name="typ" class="form-control"
                                                                           id="typ"
                                                                           value="PERYFERIA">
                                                                    <input type="hidden" name="typ_peryferii"
                                                                           class="form-control"
                                                                           id="typ"
                                                                           value="MYSZKI">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="marka">Marka</label>
                                                                    <input type="text" name="marka" class="form-control"
                                                                           id="marka">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="model">Model</label>
                                                                    <input type="text" name="model" class="form-control"
                                                                           id="model">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="rozdzielczosc">Rozdzielczość</label>
                                                                    <input type="text" name="rozdzielczosc"
                                                                           class="form-control"
                                                                           id="rozdzielczosc">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="interfejs">Interfejs</label>
                                                                    <input type="text" name="interfejs"
                                                                           class="form-control" id="interfejs">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="dlugosc_przewodu">Długość
                                                                        przewodu</label>
                                                                    <input type="text" name="dlugosc_przewodu"
                                                                           class="form-control"
                                                                           id="dlugosc_przewodu">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="myeditor">Opis</label>
                                                                    <textarea id="myeditor8" name="myeditor"></textarea>
                                                                    <script>editor('myeditor8')</script>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="cena">Cena</label>
                                                                    <input type="number" name="cena"
                                                                           class="form-control" id="cena">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="photos">Zdjęcia</label>
                                                                    <input type="file" name="photos"
                                                                           class="form-control-file"
                                                                           id="photos">
                                                                </div>
                                                                <button type="submit" class="btn btn-warning">Submit
                                                                </button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                    <div id="collapseOneFiveThree" class="collapse"
                                                         aria-labelledby="headingOneFiveThree"
                                                         data-parent="#accordionExample4">
                                                        <div class="card-body">
                                                            <form action="dodaj_przedmiot.php" method="post"
                                                                  enctype="multipart/form-data">
                                                                <div class="form-group">
                                                                    <input type="hidden" name="typ" class="form-control"
                                                                           id="typ"
                                                                           value="PERYFERIA">
                                                                    <input type="hidden" name="typ_peryferii"
                                                                           class="form-control"
                                                                           id="typ"
                                                                           value="KLAWIATURY">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="marka">Marka</label>
                                                                    <input type="text" name="marka" class="form-control"
                                                                           id="marka">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="model">Model</label>
                                                                    <input type="text" name="model" class="form-control"
                                                                           id="model">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="typ_klawiatury">Typ</label>
                                                                    <input type="text" name="typ_klawiatury"
                                                                           class="form-control" id="typ_klawiatury">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="podswietlenie">Podświetlenie</label>
                                                                    <input type="text" name="podswietlenie"
                                                                           class="form-control"
                                                                           id="podswietlenie">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="interfejs">Interfejs</label>
                                                                    <input type="text" name="interfejs"
                                                                           class="form-control"
                                                                           id="interfejs">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="myeditor">Opis</label>
                                                                    <textarea id="myeditor9" name="myeditor"></textarea>
                                                                    <script>editor('myeditor9')</script>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="cena">Cena</label>
                                                                    <input type="number" name="cena"
                                                                           class="form-control" id="cena">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="photos">Zdjęcia</label>
                                                                    <input type="file" name="photos"
                                                                           class="form-control-file"
                                                                           id="photos">
                                                                </div>
                                                                <button type="submit" class="btn btn-warning">Submit
                                                                </button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="collapseOneSix" class="collapse" aria-labelledby="headingOneSix"
                                         data-parent="#accordionExample2">
                                        <div class="card-body">
                                            <form action="dodaj_przedmiot.php" method="post"
                                                  enctype="multipart/form-data">
                                                <div class="form-group">
                                                    <input type="hidden" name="typ" class="form-control" id="typ"
                                                           value="OPROGRAMOWANIE">
                                                </div>
                                                <div class="form-group">
                                                    <label for="marka">Marka</label>
                                                    <input type="text" name="marka" class="form-control" id="marka">
                                                </div>
                                                <div class="form-group">
                                                    <label for="model">Model</label>
                                                    <input type="text" name="model" class="form-control" id="model">
                                                </div>
                                                <div class="form-group">
                                                    <label for="architektura">Architektura</label>
                                                    <input type="text" name="architektura" class="form-control"
                                                           id="architektura">
                                                </div>
                                                <div class="form-group">
                                                    <label for="licencja">Licencja</label>
                                                    <input type="text" name="licencja" class="form-control"
                                                           id="licencja">
                                                </div>
                                                <div class="form-group">
                                                    <label for="wersja">Wersja</label>
                                                    <input type="text" name="wersja" class="form-control" id="wersja">
                                                </div>
                                                <div class="form-group">
                                                    <label for="myeditor">Opis</label>
                                                    <textarea id="myeditor10" name="myeditor"></textarea>
                                                    <script>editor('myeditor10')</script>
                                                </div>
                                                <div class="form-group">
                                                    <label for="cena">Cena</label>
                                                    <input type="number" name="cena" class="form-control" id="cena">
                                                </div>
                                                <div class="form-group">
                                                    <label for="photos">Zdjęcia</label>
                                                    <input type="file" name="photos" class="form-control-file"
                                                           id="photos">
                                                </div>
                                                <button type="submit" class="btn btn-warning">Submit</button>
                                            </form>
                                        </div>
                                    </div>
                                    <div id="collapseOneSeven" class="collapse" aria-labelledby="headingOneSeven"
                                         data-parent="#accordionExample2">
                                        <div class="card-body">
                                            <form action="dodaj_przedmiot.php" method="post"
                                                  enctype="multipart/form-data">
                                                <div class="form-group">
                                                    <input type="hidden" name="typ" class="form-control" id="typ"
                                                           value="GAMING">
                                                </div>
                                                <div class="form-group">
                                                    <label for="marka">Marka</label>
                                                    <input type="text" name="marka" class="form-control" id="marka">
                                                </div>
                                                <div class="form-group">
                                                    <label for="model">Model</label>
                                                    <input type="text" name="model" class="form-control" id="model">
                                                </div>
                                                <div class="form-group">
                                                    <label for="ekran">Ekran</label>
                                                    <input type="text" name="ekran" class="form-control" id="ekran">
                                                </div>
                                                <div class="form-group">
                                                    <label for="system">System</label>
                                                    <input type="text" name="system" class="form-control" id="system">
                                                </div>
                                                <div class="form-group">
                                                    <label for="pamiec">Pamięć</label>
                                                    <input type="text" name="pamiec" class="form-control" id="pamiec">
                                                </div>
                                                <div class="form-group">
                                                    <label for="myeditor">Opis</label>
                                                    <textarea id="myeditor10" name="myeditor"></textarea>
                                                    <script>editor('myeditor10')</script>
                                                </div>
                                                <div class="form-group">
                                                    <label for="cena">Cena</label>
                                                    <input type="number" name="cena" class="form-control" id="cena">
                                                </div>
                                                <div class="form-group">
                                                    <label for="photos">Zdjęcia</label>
                                                    <input type="file" name="photos" class="form-control-file"
                                                           id="photos">
                                                </div>
                                                <button type="submit" class="btn btn-warning">Submit</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header" id="headingTwo">
                        <div class="text-center form-text-custom">
                            <p>Usuń przedmiot</p>
                        </div>
                    </div>
                    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo"
                         data-parent="#accordionExample">
                        <div class="card-body">
                            <form action="usun_przedmiot.php" method="post"
                                  enctype="multipart/form-data">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th scope="col">L.p</th>
                                        <th scope="col">ID produktu</th>
                                        <th scope="col">Rodzaj</th>
                                        <th scope="col">Marka</th>
                                        <th scope="col">Model</th>
                                    </tr>
                                    </thead>
                                    <?php
                                    $sql = "SELECT id, rodzaj, marka, model FROM sklep.produkty";
                                    $stmt = $db->prepare($sql);
                                    $query = $stmt->execute();
                                    $counter = 1;

                                    while ($data = $stmt->fetch()) {
                                        echo '
                                          <tbody>
                                            <tr>
                                              <th scope="row">' . $counter . '</th>
                                              <td>' . $data['id'] . '</td>
                                              <td>' . $data['rodzaj'] . '</td>
                                              <td>' . $data['marka'] . '</td>
                                              <td>' . $data['model'] . '</td>
                                              <input name="id" type="hidden" value=' . $data['id'] . '>
                                              <input name="rodzaj" type="hidden" value=' . $data['rodzaj'] . '>
                                              <input name="marka" type="hidden" value=' . $data['marka'] . '>
                                              <input name="model" type="hidden" value=' . $data['model'] . '>
                                              <td><button type="submit" class="btn btn-danger">Usuń</button></td>
                                          </tbody>
                                        ';
                                        $counter++;
                                    }
                                    ?>

                                </table>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header" id="headingThree">
                        <div class="text-center form-text-custom">
                            <p>Dodaj artykuł</p>
                        </div>
                    </div>
                    <div id="collapseThree" class="collapse" aria-labelledby="headingThree"
                         data-parent="#accordionExample">
                        <div class="card-body">
                            <form action="dodaj_artykul.php" method="post"
                                  enctype="multipart/form-data">
                                <textarea name="myeditor11" id="myeditor"></textarea>
                                <script>editor('myeditor11')</script>
                                <button type="submit" class="btn btn-warning">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header" id="headingThree">
                        <div class="text-center form-text-custom">
                            <p>Usuń użytkownika</p>
                        </div>
                    </div>
                    <div id="collapseFour" class="collapse" aria-labelledby="headingFour"
                         data-parent="#accordionExample">
                        <div class="card-body">
                            <form action="usun_uzytkownika.php" method="post"
                                  enctype="multipart/form-data">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th scope="col">L.p</th>
                                        <th scope="col">Imię</th>
                                        <th scope="col">Nazwisko</th>
                                        <th scope="col">Email</th>
                                    </tr>
                                    </thead>
                                    <?php
                                    $sql = "SELECT użytkownicy.id, użytkownicy.imie, użytkownicy.nazwisko, użytkownicy.email FROM użytkownicy LEFT JOIN użytkownicy_login ul on ul.email = użytkownicy.email WHERE użytkownicy.email = ul.email";
                                    $stmt = $db->prepare($sql);
                                    $query = $stmt->execute();
                                    $counter = 1;
                                    while ($data = $stmt->fetch()) {
                                        echo '
                                          <tbody>
                                            <tr>
                                              <th scope="row">' . $counter . '</th>
                                              <td id="' . $data['id'] . '">' . $data['imie'] . '</td>
                                              <td>' . $data['nazwisko'] . '</td>
                                              <td>' . $data['email'] . '</td>
                                              <input name="id" type="hidden" value=' . $data['id'] . '>
                                              <td><button type="submit" class="btn btn-danger">Usuń</button></td>
                                          </tbody>';
                                        $counter++;
                                    }
                                    ?>
                                </table>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php require_once('footer.php') ?>

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