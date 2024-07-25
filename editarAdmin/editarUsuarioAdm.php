<?php 


require_once '../controladores/funciones.php';
$db= new DataBase();//instanciamos la clase DataBase que esta en CONFIG
 
 $con= $db->conectar();


$user = $_SESSION['usuarioAdm'];

 $sql="SELECT * FROM inicio2 WHERE usuario='".$user."'";

 $resultado=$con->query($sql);
    
    while($data=$resultado->fetch(PDO::FETCH_ASSOC)){
  

       $usuario=$data['usuario'];
        $contraseña=$data['contraseña'];
        $id=$data['id_registro'];

        
    }
    editar_Usuario();
?>
<!DOCTYPE html>
<html lang="en">
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
<body>

<div>
      <form action="" method="Post">
            <label for="usuario">Usuario</label><br>
            <div hidden><input type="text" name="id" id=""value="<?= $id?>"></div>
             <input type="text" name="usuario" id="" value="<?= $usuario?>"><br>
             <label for="contraseña">Contraseña</label><br>
             <input type="text" name="contraseña" id="" value="<?= $contraseña?>"><br>
             <input type="submit" value="actualizar" name="EditarUsuarioAdm"><br>
        </form>
 </div>
</body>
</html>
