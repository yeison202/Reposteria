<?php 
require '../controladores/controlador.php';
require '../controladores/funciones.php';

$db= new DataBase();
    $con= $db->conectar();

    $sql= $con->query("SELECT * FROM inicio3 INNER JOIN  usuario on inicio3.id_inicio=usuario.id_cliente INNER JOIN registro on usuario.id_usuario=registro.usuario_id");


    $sql->execute();
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
<link rel="stylesheet" href="../CSS1//estilo_lista.css">
</head>
<body>
<header>
        <div class="navbar navbar-expand-lg">
            <div class="container"> 
                <a href="#" class="navbar-brand" id="logo">
                    <img src="../wed/imagenes/logotipoabuela.png">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarHeader" aria-controls="navbarHeader" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarHeader">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        
                        <li class="nav-item">
                            <a href="../admin/perfil.php" class="nav-link active">PERFIL</a>
                        </li>
                        <li class="nav-item">
                            <a href="../admin/miniProyecto.php" class="nav-link active">INICIO</a>
                        </li>
                        
                                                
                    </ul> 
                   
                    </a>
                </div>

            </div>
        </div>
    </header>
    
<main>
        <div class="container">
            <div class="table-responsive">
                <table  class="table table-striped-columns" >
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>usuario</th>
                            <th>contraseña</th>
                            <th>Cliente</th>
                            <th>Nombre</th>
                            <th>Apellido</th>
                            <th>Telefono</th>
                            <th>Fecha de Nacimiento</th>
                            <th>Correo</th>
                            <th>Aciones</th>


                           
                            
                        </tr>
                    </thead>
                    <tbody>
                        <?php if(!$resultado=$sql->fetchAll(PDO::FETCH_ASSOC))
                        {
                            echo'<tr><td colspan="5" class="text-center"><b>Lista vacia</b></td></tr>';
                        }else{
                            $total=0;

                            foreach($resultado as $producto)
                            {
                                $_id= $producto['id_inicio'];
                                $usuario= $producto['usuario_inicio'];
                                $contraseña= $producto['contraseña_inicio'];
                                $cliente= $producto['id_cliente'];
                                $nombre= $producto['nombre'];
                                $apellido= $producto['apellido'];
                                $telefono= $producto['telefono'];
                                $fecha= $producto['fecha'];
                                $correo= $producto['correo'];
                                




                       ?>
                        <tr>
                            <td><?php echo $_id;?></td>
                            <td><?php echo $usuario;?></td>
                            <td><?php echo $contraseña;?></td>
                            <td><?php echo $cliente;?></td>
                            <td><?php echo $nombre;?></td>
                            <td><?php echo $apellido;?></td>
                            <td><?php echo $telefono;?></td>
                            <td><?php echo $fecha;?></td>
                            <td><?php echo $correo;?></td>
                             <td>
        <form action="" method="post">
            <input type="text" name="id" value="<?php echo $_id ?>"hidden >
            <input type="submit" value="eliminar" name="eliminar" id="eliminar">
            <?php eliminar_Usuario();?>
        </form>
         </td>   
                        </tr>
                        <?php }?>

                       
                    </tbody>
                    <?php }?>
                </table>
            </div>



</body>
</html>

