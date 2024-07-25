<?php 
//require_once 'conexion/conexion2.php';

require_once ('controladores/controlador.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
      
    <link rel="stylesheet" href="./CSS1/estilos.css">
    <link rel="stylesheet" href="style.css">

</head>
<body>    
     <header>
        <div class="navbar navbar-expand-lg">
            <div class="container"> 
                <a href="#" class="navbar-brand" id="logo">
                    <img src="./wed/imagenes/logotipoabuela.png">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarHeader" aria-controls="navbarHeader" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarHeader">
                    <ul class="navbar-nav me-auto ">
                        
                        <li class="nav-item">
                            <a href="./cliente/inicio.php" class="nav-link active">INICIAR SESIÓN</a>
                        </li>
                    </ul> 
                   
                    </a>
                </div>

            </div>
        </div>
    </header>
<main>
<div class="row">
  <div class="col-lg-4 mb-4 mb-lg-0">
    <img
      src="wed/imagenes/tortas.jfif"
      class="w-100 shadow-1-strong rounded mb-4"
      alt="Pasteles"
    />
   
  </div>

  <div class="col-lg-4 mb-4 mb-lg-0">
    <img
      src="wed/imagenes/personal.jfif"
      class="w-100 shadow-1-strong rounded mb-4"
      alt="personal"
    />

    
  </div>

  <div class="col-lg-4 mb-4 mb-lg-0">
    <img
      src="wed/imagenes/pasteleria.jpeg"
      class="w-100 shadow-1-strong rounded mb-4"
      alt="panes"
    />

    
  </div>
</div>
</main>


<footer>
    
    <div class="margen">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <p class="contacto"><b>CONTACTO</b></p>
                    <p class="contacto">Calle 18, calles 37 y 38, Barquisimeto, Barquisimeto, Edo Lara, Barquisimeto 3001, Lara.<br>
                    Teléfono : +58-(412) 0292946<br>
                    Correo electrónico:<a href="https://hotmail.com/" target="_blank" rel="noopener noreferrer"> reposterialadona@hotmail.com</a></a></p>
                </div>

                <div class="col-md-4">
                    <p class="red-social"><b>SIGUENOS</b></p>
                    <div class="redes">
                        <a href="#" ><img class="social-icon" src="wed/imagenes/facebook.png" alt="facebook" title="facebook"></a>
            
                        <a href="https://www.instagram.com/ladona_reposteria/"><img class="social-icon" src="wed/imagenes/instagram.png" alt="instagram" title="instagram"></a>
        
                        <a href="https://hotmail.com/reposterialadona@hotmail.com"><img class="social-icon" src="wed/imagenes/correo.png" alt="gmail" title="gmail"></a>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="logod">
                    <img id="imageDOÑA" src="wed/imagenes/logotipoabuelaMarron.png" alt="Logo"">
                    </div> 
                </div>
            <small>&copy; 2023 <b>La Doña</b> --- Todos los derechos reservados</small>
            </div>
        </div>
        </div>
        <br> <br>
    </footer>
</body>
</html>