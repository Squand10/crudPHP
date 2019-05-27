<?php

include_once 'connexion.php';

$connect = connectDB();

$sql_select = "SELECT id, tache, nom, date, status  FROM todolist";
$result = mysqli_query($connect , $sql_select);

if (isset($_GET['delete'])){
    $sql = "DELETE FROM todolist WHERE id =" . $_GET['delete'];
    $result = mysqli_query($connect, $sql);
    header('Location: index.php');
}


mysqli_close($connect);
?>
<DOCTYPE HTML>
    <!DOCTYPE html>
    <html lang="en, fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>TP ToDoList PHP</title>
    </head>
    <body>
    <header>

    </header>
<h1>TO DO LIST PHP</h1>
    <form method="post" action="form.php">
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Tâche</label>
            <div class="col-sm-8">
                <input type="text" class="form-control" placeholder="Tâche" name="tache">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Nom</label>
            <div class="col-sm-8">
                <input type="text" class="form-control"  placeholder="Nom" name="nom">
            </div>
        </div>
        <button type="submit" class="btn btn-primary" value="OK">Envoyer</button>
    </form>
    <div><ul class="list-group">
        <?php
        while($row = mysqli_fetch_row($result)){
            echo "<li class='list-group-item'>Tâche : $row[1], ajouté par :  $row[2] le $row[3] statut : $row[4].<a id='$row[0]' href=\"index.php?delete=$row[0]\" type=\"submit\" class=\"btn btn-primary\">X</a></li>";
        }
        ?>
        </ul>
    </div>
    </body>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    </html>