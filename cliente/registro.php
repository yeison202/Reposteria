
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="../CSS1/estilos_register.css">

</head>
<body>
    <div class="main">

        <form  method="post">
            
                <legend>Formulario de registro</legend>
                <?php 
            require_once '../controladores/funciones.php';
            registroCliente();   
?>
                <label for="nombre">Nombre</label>
                <input type="text" name="nombre" id=""  requireda><br>
                <label for="apellido">Apellido</label>
                <input type="text" name="apellido" id=""  requireda><br>
                <label for="telefono">Telefono</label>
                <input type="tel" name="telefono" id=""  requireda><br>
                <label for="fecha">Fecha de nacimiento</label>
                <input type="date" name="fecha" id="" requireda><br>
                <label for="correo">Correo</label>
                <input type="email" name="correo" id=""  requireda><br>
                <label for="usuario">Usuario</label>
                <input type="text" name="usuario" id=""  requireda><br>
                <label for="contraseña">Contraseña</label>
                <input type="password" name="contraseña" id=""  requireda><hr>
                <input type="submit" value="Registrar" name="RegistrarCliente">
                <input type="reset" value="Limpiar"><br>
                <div class="inicio">Ir a <a href="../cliente/inicio.php">Inicio sesion</a></div>
                <div class="pagina_principal">Quiero volver a la <a href="../pagina_inicion.php">Pagina principal</a></div>
             
            
          
          </form > 
</div>              
            
</div>

</body>
</html>