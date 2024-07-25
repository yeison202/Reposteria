
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>inicio</title>

    <link rel="stylesheet" href="../CSS1/estilos_login.css">
</head>
<body>
   
                
    <form method="POST">
        <h1>Sesion Admin</h1>
        <?php 
        require '../controladores/controlador.php';
        ?>
        <br>
        <div class="usuario">
        <input type="text" name="usuarioAdm" id="" placeholder="usuario" >
                    
    
        </div>
                
        <div class="usuario">
        <input type="password" name="contraseñaAdm" id="" placeholder="contraseña" >
                    
    
        </div>
    
        <div class="olvido">Recuperar contraseña</div>
        <input type="submit"name="enviarAdm" value="INICIO DE SESION">
        <div class="registro">Quiero <a href="admin.php">Registrar Admin</a></div>
        <div class="pagina_inicio">Quiero volver a la <a href="../pagina_inicion.php">Pagina principal</a></div>

               
    </form>
            
       
    
    
</body>
</html>