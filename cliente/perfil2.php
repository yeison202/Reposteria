<?php 

require_once '../controladores/controlador.php';
$db= new DataBase();//instanciamos la clase DataBase que esta en CONFIG
 
 $con= $db->conectar();
$user = $_SESSION['usuario'];
$sql= $con->query("SELECT * FROM inicio3 INNER JOIN  usuario on  inicio3.id_inicio=usuario.id_cliente");
$sql= $con->query("SELECT * FROM registro INNER JOIN usuario on registro.usuario_id = usuario.id_usuario");





 $sql->execute();

    
    while($data = $sql->fetch(PDO::FETCH_ASSOC)){

        $nombre=$data['nombre'];
        $apellido=$data['apellido'];
        $telefono=$data['telefono'];
        $fecha=$data['fecha'];
        
        
    }

 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="../CSS1/stylePerfil.css">

</head>
<body>
    
    <header>
        
            <img src="../wed/imagenes/usuario1.jpg" alt="yeison" width="30%"><br>
            <h2 class ="nombre"><?php echo $nombre  ;?></h2>
        
   </header>
        
    <div class="encabezado">        
        <nav>
            <a href="../cliente/miniProyecto2.php" class="enlaces">Pagina principal</a>
            
            
            
            <a href="compras.php" class="enlaces">Compras</a>
            <a href="../modulos/cerrar.php" class="enlaces">Cerrar sesion</a>
           </nav>
        
    </div>

    <div class="DetallesUsuario">
        <fieldset>
            <h3>Detalles de usuario</h3>
            <label for="">Nombre:</label>
            <?php echo $nombre;?>
            <br>
            <label for="">Apellido:</label>
            <?php echo $apellido;?>
            <br>
            <label for="">Telefono:</label>
            <?php echo $telefono;?>
            <br>
            <label for="">Fecha de nacimiento:</label>
            <?php echo $fecha;?>
            <br>
            <a href="../editarCliente/editarDatosCliente.php">Editar</a><br>
            <label>Deseas <a href="../editarCliente/editarUsuarioCliente.php" > Editar el Usuario y la contraseña?</a></label>
        </fieldset>
               
    </div>

    
    </div>

    
</body>
</html>