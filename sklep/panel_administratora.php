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
require_once "connect.php";
?>
<?php require_once('topmenu.php') ?>
<div class="container content">
    <div class="row">
        <div class="col-md-3">
            <div class="btn-group-vertical btn-block">
                <button type="button" class="btn btn-warning" data-toggle="collapse" aria-expanded="true"
                        aria-controls="collapseOne" data-target="#collapseOne">Wiadomości
                </button>
                <button type="button" class="btn btn-warning" data-toggle="collapse" aria-expanded="true"
                        aria-controls="collapseTwo" data-target="#collapseTwo">Zarządzaj moderatorami
                </button>
            </div>
        </div>
        <div class="col-md-9">
            <div class="accordion" id="accordionExample">
                <div class="card">
                    <div class="card-header" id="headingOne">
                        <div class="text-center form-text-custom">
                            <p>Wiadomości</p>
                        </div>
                    </div>
                    <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                        <div class="card-body">
                            <form action="#" method="get" id="wiadomosci"
                                  enctype="multipart/form-data">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th scope="col">L.p</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Treść</th>
                                        <th scope="col">Data wysłania</th>
                                    </tr>
                                    </thead>
                                    <?php
                                    $sql = "SELECT id, email, tresc, data_wyslania FROM wiadomosci WHERE id_admina = '{$_SESSION['id']}'";
                                    $stmt = $db->prepare($sql);
                                    $query = $stmt->execute();
                                    $stmt2 = $db->prepare($sql);
                                    $query2 = $stmt2->execute();
                                    $dataa = $stmt2->fetchAll();
                                    $counter = 1;
                                    while ($data = $stmt->fetch()) {
                                        echo '
                                          <tbody>
                                            <tr>
                                              <th scope="row">' . $counter . '</th>
                                              <td id="' . $data['id'] . '">' . $data['email'] . '</td>
                                              <td class="text-wrap">' . $data['tresc'] . '</td>
                                              <td>' . $data['data_wyslania'] . '</td>
                                              <input name="email" type="hidden" value=' . $data['email'] . '>
                                              <td><button type="button" onclick="getEmail(' . $data['id'] . ')" class="btn btn-danger" data-toggle="collapse" aria-expanded="true"
                        aria-controls="collapseThree" data-target="#collapseThree">Reply</button></td>
                                          </tbody>
                                        ';
                                        $counter++;
                                    }
                                    ?>

                                </table>
                            </form>
                            <div class="accordion" id="accordionExample2">
                                <div class="card">
                                    <div id="collapseThree" class="collapse" aria-labelledby="headingThree"
                                         data-parent="#accordionExample2">
                                        <div class="card-body">
                                            <form action="odpowiedz.php" method="post" id="wiadomosci"
                                                  enctype="multipart/form-data">
                                                <p>Odpowiadasz dla: </p> <span id="replyTo"></span>
                                                <input id="replyToInputHidden" name="email" type="hidden" value="asd">
                                                <textarea id="myeditor12" name="myeditor"></textarea>
                                                <script>editor('myeditor12')</script>
                                                <button type="submit" onclick="setEmail()" class="btn btn-warning">
                                                    Odpowiedz
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header" id="headingOne">
                        <div class="text-center form-text-custom">
                            <p>Zarządzaj moderatorami</p>
                        </div>
                    </div>
                    <div id="collapseTwo" class="collapse" aria-labelledby="headingFour"
                         data-parent="#accordionExample2">
                        <div class="card-body">
                            <button type="button" class="btn btn-warning" data-toggle="collapse" aria-expanded="true"
                                    aria-controls="collapseFour" data-target="#collapseFour">Dodaj moderatora
                            </button>
                            <button type="button" class="btn btn-warning" data-toggle="collapse" aria-expanded="true"
                                    aria-controls="collapseFive" data-target="#collapseFive">Usuń moderatora
                            </button>
                            <div class="card">
                                <div id="collapseFour" class="collapse" aria-labelledby="headingFour"
                                     data-parent="#accordionExample2">
                                    <div class="card-body">
                                        <form action="dodaj_moderatora.php" method="post" id="wiadomosci"
                                              enctype="multipart/form-data">
                                            <p>Wprowadź id nowego moderatora</p>
                                            <input type="number" name="userId">
                                            <button type="submit" class="btn btn-warning">Odpowiedz</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div id="collapseFive" class="collapse" aria-labelledby="headingFive"
                                     data-parent="#accordionExample2">
                                    <div class="card-body">
                                        <form action="usun_moderatora.php" method="post"
                                              enctype="multipart/form-data">
                                            <table class="table">
                                                <thead>
                                                <tr>
                                                    <th scope="col">L.p</th>
                                                    <th scope="col">ID Moderatora</th>
                                                    <th scope="col">Imię</th>
                                                    <th scope="col">Nazwisko</th>
                                                </tr>
                                                </thead>
                                                <?php
                                                $sql = "SELECT id, imie, nazwisko, użytkownicy.email FROM sklep.użytkownicy INNER JOIN sklep.moderatorzy_login ON użytkownicy.email = moderatorzy_login.email";
                                                $stmt = $db->prepare($sql);
                                                $query = $stmt->execute();
                                                $counter = 1;

                                                while ($data = $stmt->fetch()) {
                                                    echo '
                                                      <tbody>
                                                        <tr>
                                                          <th scope="row">' . $counter . '</th>
                                                          <td>' . $data['id'] . '</td>
                                                          <td>' . $data['imie'] . '</td>
                                                          <td>' . $data['nazwisko'] . '</td>
                                                          <input name="email" type="hidden" value=' . $data['email'] . '>
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
<script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote.js"></script>

<script>
    function getEmail(counter) {
        var email = document.getElementById(counter.toString()).innerText;
        document.getElementById("replyTo").innerText = email;
    }
</script>

<script>
    function setEmail() {
        var email = document.getElementById("replyTo").innerText;
        document.getElementById("replyToInputHidden").value = email;
    }
</script>
</body>
</html>