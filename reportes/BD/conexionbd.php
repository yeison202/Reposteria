<?php

    $server = 'localhost';
    $user = 'root';
    $pass ='';
    $bd = 'inicio';

    $conexion = new mysqli($server, $user, $pass, $bd);
    if (mysqli_connect_errno()){
        echo 'No conectado', mysqli_connect_error();
        exit();
    }else{
        echo ':)';
    }
?>