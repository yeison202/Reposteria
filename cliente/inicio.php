
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>inicio</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="style.css">

    <link rel="stylesheet" href="../CSS1/estilos_login.css">
</head>
<body>
   
                
    <form method="POST">
        <h1>Inicio de sesion</h1>
        <?php 
    require '../controladores/controlador.php';
    require '../controladores/funciones.php';
        ?>
        <br>
        <div class="usuario">
        <input type="text" name="usuario" id="" placeholder="usuario" >
                    
    
        </div>
                
        <div class="usuario">
        <input type="password" name="contraseña" id="" placeholder="contraseña" >
                    
    
        </div>
    
        <div class="olvido">Recuperar contraseña</div>
        <input type="submit"name="enviar" value="INICIO DE SESION">
        <div class="registro">Quiero <a href="../cliente/registro.php">Registrarme</a></div>
        <div class="pagina_inicio">Quiero volver a la <a href="../pagina_inicion.php">Pagina principal</a></div>

               
    </form>
            
    <div class="administrador">
                <form action="" method="post" class="admin">
                <?php admin();?>
                    <input type="password" name="admin" id="admin" placeholder="codigo de administrador" class="codigo">
                    <input type="submit" value="Canjear" name="enviar" class="enviar">
                    
                 </form>
    </div>
   
</body>
</html>