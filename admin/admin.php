
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../CSS1/estilos_register.css">

</head>
<body>
    <div class="main">

        <form  method="post">
            
                <legend>Registro Admin</legend>
                <?php 
            require '../controladores/funciones.php';
            registro();   
?>
                <label for="nombre">Nombre</label>
                <input type="text" name="nombreAdm" id="" ><br>
                <label for="apellido">Apellido</label>
                <input type="text" name="apellidoAdm" id=""  ><br>
                <label for="telefono">Telefono</label>
                <input type="tel" name="telefonoAdm" id="" ><br>
                <label for="fecha">Fecha de nacimiento</label>
                <input type="date" name="fechaAdm" id="" ><br>
                <label for="correo">Correo</label>
                <input type="email" name="correoAdm" id=""  ><br>
                <label for="usuario">Usuario</label>
                <input type="text" name="usuarioAdm" id=""  ><br>
                <label for="contraseña">Contraseña</label>
                <input type="password" name="contraseñaAdm" id="" ><hr>
                <input type="submit" value="Registrar" name="RegistrarAdm">
                <input type="reset" value="Limpiar"><br>
                <div class="inicio">Ir a <a href="inicio2.php">Iniciar Sesion Admin</a></div>
                <div class="pagina_principal">Quiero volver a la <a href="../pagina_inicion.php">Pagina principal</a></div>
             
            
          
          </form>

    </div>
    
</body>
</html>