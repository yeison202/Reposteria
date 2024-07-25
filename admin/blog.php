<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
      
    <link rel="stylesheet" href="../CSS1/estilo_blog.css">

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
                            <a href="./miniProyecto.php" class="nav-link active">PAGINA DE INICIO</a>
                        </li>
                        <li class="nav-item">
                            <a href="./Formulario.php" class="nav-link active">AGREGAR TEMA</a>
                        </li>
                       
                    </ul> 
                   
                    </a>
                </div>

            </div>
        </div>
    </header>

<body>
    

<div class="contenedor">

<?php 
require '../controladores/funciones.php';

$db= new DataBase();//instanciamos la clase DataBase que esta en CONFIG
 
 $con= $db->conectar();
 //$sql= $con->query("SELECT * FROM inicio2 INNER JOIN formulario_blog on inicio2.id_blog = formulario_blog.id_formulario");

 $sql=$con->query("SELECT * FROM formulario_blog ORDER BY FECHA DESC");
 $sql->execute();
  

 while($data = $sql->fetch(PDO::FETCH_ASSOC)){
        echo "<h1 class='titulo'>" . $data['Titulo'] . "</h1><br/>";
        if($data['Imagen']!=""){

            echo "<div class='imagen'><img src='../directorio/" . $data['Imagen'] . "' width='600px'  /></div>";
    
        }
        
        echo "<br/><br/>";

        echo "<p class='review-text'>" .$data['Comentario'] . "</p><br>";
        echo "<h2 class='fecha'>" .$data['Fecha'] . "</h2>";
        ?>
        <form action="" method="post">
            <input type="text" name="id" value="<?php echo $data['id_formulario'] ?>"hidden >
            <div class="eliminar"><input type="submit" value="eliminar" name="eliminar" id="eliminar"></div>
        </form>
        <?php
            eliminar();
           echo "<br><br><br>";
    
}
echo "<br/><br/><br/>";







?>
</div>

</body>
</html>