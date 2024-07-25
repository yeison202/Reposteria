<?php 
require '../controladores/funciones.php';
$db= new DataBase();
 $con= $db->conectar();

$user = $_SESSION['usuarioAdm'];
$sql= $con->query("SELECT * FROM inicio2 INNER JOIN  usuario on  inicio2.id_registro=usuario.id_admin");
$sql= $con->query("SELECT * FROM registro INNER JOIN usuario on registro.usuario_id = usuario.id_usuario");
 

    
    while($data = $sql->fetch(PDO::FETCH_ASSOC)){

        $nombre=$data['nombre'];
        $apellido=$data['apellido'];
        $telefono=$data['telefono'];
        $fecha=$data['fecha'];
        $id=$data['id'];
        
    }
        editar_Datos();
?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
      
      <link rel="stylesheet" href="../CSS1/estilos_editar.css">
  
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
                              <a href="../admin/miniProyecto.php" class="nav-link active">PAGINA DE INICIO</a>
                          </li>
                          <li class="nav-item">
                              <a href="../admin/perfil.php" class="nav-link active">PERFIL</a>
                          </li>
                         
                      </ul> 
                     
                      </a>
                  </div>
  
              </div>
          </div>
      </header>
    

</head>
<div clase="contenedor">
                <form action="" method="Post">
            <label for="nombre">Nombre</label><br>
                <div hidden><input type="text" name="id" id=""value="<?= $id?>"></div>
                <input type="text" name="nombre" id="" value="<?= $nombre?>"><br>
                <label for="apellido">Apellido</label><br>
                <input type="text" name="apellido" id="" value="<?= $apellido?>"><br>
                <label for="telefono">Telefono</label><br>
                <input type="tel" name="telefono" id="" value="<?= $telefono?>"><br>
                <label for="fecha">Fecha de nacimiento</label><br>
                <input type="date" name="fecha" id="" value="<?= $fecha?>"><br>
                
                <input type="submit" value="actualizar" name="controlEditarAdm"><br>
                </form>
            </div>
             
            
