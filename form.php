<?php

include_once 'connexion.php';

$connect = connectDB();


if(isset($_POST['tache']))      $tache=$_POST['tache'];
else      $tache="";

if(isset($_POST['nom']))      $nom=$_POST['nom'];
else      $nom="";

$pop="";

if (empty($tache) OR empty($nom)){
    $pop = "<p style='color:red'>ERREUR<p>";

}
elseif (!empty($tache) AND !empty($nom)){

    $sql_insert = "INSERT INTO todolist(tache, nom, date, status) VALUES('$tache','$nom', now(), 'En cours')";

    mysqli_query($connect, $sql_insert);

    $pop = "<p style='color:green'>Votre tâche a été ajoutée<p>";
}



mysqli_close($connect);
header('Location: index.php');
