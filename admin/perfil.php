<?php 

require_once '../controladores/controlador.php';
$db= new DataBase();//instanciamos la clase DataBase que esta en CONFIG
 
 $con= $db->conectar();
//$user = $_SESSION['usuario'];
$sql= $con->query("SELECT * FROM inicio2 INNER JOIN  usuario on  inicio2.id_registro=usuario.id_admin");
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
    <link rel="stylesheet" href="../CSS1/stylePerfil.css">

</head>
<body>
    
    <header>
        
            <img src="../wed/imagenes/usuario1.jpg" alt="yeison" width="30%"><br>
            <h2 class ="nombre"><?php echo $nombre  ;?></h2>
        
   </header>
        
    <div class="encabezado">        
        <nav>
            <a href="./miniProyecto.php" class="enlaces">Pagina principal</a>
            <a href="ventas.php" class="enlaces">Ventas</a></li>
            
            
            <a href="lista_Usuarios.php" class="enlaces">Lista usuarios</a>
            <a href="../reportesAdmin/reporteProductos.php?php echo $row['id_transaccion']; ?>" target = "_blank"  class="enlaces">Reporte de Productos</a>

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
            <a href="../editarAdmin/editarDatosAdm.php">Editar</a><br>
            <label>Deseas <a href="../editarAdmin/editarUsuarioAdm.php"> Editar el Usuario y la contraseña?</a></label>
        </fieldset>
               
    </div>

    
    </div>
</body>
</html>