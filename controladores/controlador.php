<?php
require 'conexion2.php';
session_start();

$db= new DataBase();//instanciamos la clase DataBase que esta en CONFIG
    $con= $db->conectar();

if (!empty($_POST["enviar"])){
    if (empty($_POST["usuario"]) or empty($_POST["contraseña"])){

        echo '<div class="alerta">LOS CAMPOS ESTAN VACIOS</div>';

    }else{
        $usuario=$_POST["usuario"];
        $clave=$_POST["contraseña"];
        
        $_SESSION['usuario']=$usuario;
        $_SESSION['contraseña']=$clave;


        
        
        $sql=$con->query("SELECT * FROM inicio3 WHERE usuario_inicio='".$usuario."' and contraseña_inicio='".$clave."'");
        $sql->execute();
        if ($resultado=$sql->fetchAll(PDO::FETCH_ASSOC))

       {
            header("location:../cliente/miniProyecto2.php");
        } else {
            echo '<script language="javascript">alert("ACCESO DENEGADO")</script>';

        }
    }
}

if (!empty($_POST["enviarAdm"])){
    
    if (empty($_POST["usuarioAdm"]) or empty($_POST["contraseñaAdm"])){

        echo '<div class="alerta">LOS CAMPOS ESTAN VACIOS</div>';

    }else{
        
        $usuario=$_POST["usuarioAdm"];
        $clave=$_POST["contraseñaAdm"];
        
        $_SESSION['usuarioAdm']=$usuario;
        $_SESSION['contraseñaAdm']=$clave;

    
        
        
        $sql=$con->query("SELECT * FROM inicio2 WHERE usuario='".$usuario."' and contraseña='".$clave."'");
        $sql->execute();
        if ($resultado=$sql->fetchAll(PDO::FETCH_ASSOC))

       {
            header("location:miniProyecto.php");
        } else {
            echo '<script language="javascript">alert("ACCESO DENEGADO")</script>';

        }
        
    }
    
}

?>