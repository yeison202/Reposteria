<?php
    require 'CONFIG/config.php';
    require '../controladores/controlador.php';
    $db= new DataBase();
    $con= $db->conectar();

    $sql= $con->query("SELECT * FROM productos WHERE activo=1");
    $sql->execute();
    $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LA DOÑA</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
      
    <link rel="stylesheet" href="CSS/style.css">
</head>
<body>
    <header>
        <div class="navbar navbar-expand-lg">
            <div class="container"> 
                <a href="#" class="navbar-brand" id="logo">
                    <img src="IMAGE/Iconos/logotipoabuela.png">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarHeader" aria-controls="navbarHeader" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarHeader">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0 w-100">
                        <li class="nav-item">
                            <a href="../admin/miniProyecto.php" class="nav-link active">INICIO</a>
                        </li>
                        <li class="nav-item">
                            <a href="agregar_Producto.php" class="nav-link active">AGREGAR PRODUCTO</a>
                        </li>
                        <li class="nav-item">
                            <a href="index.php" class="nav-link active">TIENDA</a>
                        </li>
                        <li class="nav-item">
                            <a href="../admin/blog.php" class="nav-link active">BLOG</a>
                        </li>
                        <div class="dropdown">
                            <button class="btn dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <?php echo $_SESSION['usuarioAdm'];?>
                            </button>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="../admin/perfil.php">Ver Perfil</a></li>
                                <li><a class="dropdown-item" href="../modulos/cerrar.php">Cerrar Sesion</a></li>
                            </ul>
                         </div>
                    </ul> 
                    <a href="checkout.php" class="btn"> <img href="checkout.php" id="canasta" src="IMAGE/Iconos/canasta.png"><span id="num_cart" class="badge bg-secondary"><?php echo $num_cart; ?></span>
                    </a>
                </div>

            </div>
        </div>
    </header>

    <main>
        <div class="container">
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-5">
                <?php foreach($resultado as $row){
                    ?>
                    <div class="col">
                        <div class="card shadow-sm">
                           <?php if($row['imagen']!=""){?> 
                            <img src="IMAGE/Productos/<?php echo $row['imagen']; ?>" class="d-block w-100">
                             <?php }else{?>
                                <img src="IMAGE/no-imagen.png" class="d-block w-100">
                                   
                               <?php }?> 
                             
                               <div class="card-body">
                                <h5 class="card-title"><?php echo $row['titulo']; ?></h5>
                                <p class="card-text">$<?php echo $row['precio']; ?></p>

                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="btn-group">

                                    <a href="detalles.php?id=<?php  echo $row['id']; ?>&token=<?php  echo hash_hmac('sha1', $row['id'], KEY_TOKEN);//sha1 es una contraseña y ID es el dato que queremos cifrar
                                    ?>" class="btn btn-outline-secondary">DETALLES</a>
                                    </div>
                                    <button class="btn btn-outline-secondary" type="button" onclick="addProducto(<?php echo  $row['id']; ?>, '<?php  echo hash_hmac('sha1', $row['id'], KEY_TOKEN);?>')">Agregar</button>

                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

    <script>//vamos a enviar  mediante ajax para actualizar en tiempo real los datos del carrito. Vamos a usar una api llamada  fetch que nos proporciona js
        function addProducto(id, token)
        {
            let url= 'CLASES/carrito.php'
            let formData= new FormData()  
            //nos va a ayudar a enviar los parametros mediante metodo post
            formData.append('id', id)//parametros
            formData.append('token', token)//parametros

            fetch(url,
            { 
                //enviamos la url hacia donde vamos a enviar datos
                //aqui vamos a enviar algunas configuraciones o propiedades para el evento fetch
                method:'POST',
                body: formData,
                mode:'cors'
            }).then(response => response.json()) 
            //aqui recibimos el arreglo  $datos['ok']=false; y lo transformamos en json
            .then(data =>
            {
                if(data.ok)
                {
                    let elemento= document.getElementById("num_cart")
                    elemento.innerHTML=data.numero//valor que nos esta regresando $dato['numero'] contando los ID que se tienen de cada uno de los productos
                }
            })
        }
    </script>
</body>
</html>