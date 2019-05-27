<?php

function connectDB()
{
    if ($_SERVER['SERVER_NAME'] == 'localhost') {
        // info serveur local
        $_Host = 'localhost';
        $_Login = 'root';
        $_Pwd = '';
        $_DBName = "php_rapide";
    } else {
        // info serveur en ligne
        $_Host = 'domaine';
        $_Login = 'OOUHBHFGDFJ';
        $_Pwd = '1234';
        $_DBName = "dawan";
    }

    // connexion a la base de donnĂ©es local ou en ligne
    $connect = mysqli_connect($_Host, $_Login, $_Pwd, $_DBName);

    return $connect;
}