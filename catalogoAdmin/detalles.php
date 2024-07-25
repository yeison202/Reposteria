<?php
    require 'CONFIG/config.php';
    require '../controladores/controlador.php';
    $db= new DataBase();//instanciamos la clase DataBase que esta en CONFIG
    $con= $db->conectar();

    $id = isset($_GET['id']) ? $_GET['id'] : ''; 
    $token = isset($_GET['token']) ? $_GET['token'] : '';
    /*isset es como un if, dice si ($_GET['id']) esta definido, entonces obtenlo= ? y sino entonces ponle este valor= ''*/
    if($id ==''||$token =='')
    {
        echo 'error';
        exit;
    }
    else
    {
        $token_tmp = hash_hmac('sha1', $id, KEY_TOKEN);

        if($token==$token_tmp)
        {
            $sql= $con->prepare("SELECT count(id) FROM productos WHERE id=? AND activo=1");
            $sql->execute([$id]);

            if($sql->fetchColumn()>0)
            {
                $sql = $con->prepare("SELECT * FROM productos WHERE id=? AND activo=1 LIMIT 1");
                $sql->execute([$id]);

                $row= $sql->fetch(PDO::FETCH_ASSOC);

                $titulo= $row['titulo'];
                $descripcion= $row['descripcion'];
                $precio= $row['precio'];
                $descuento= $row['descuento'];
                $precio_descuento=$precio-(($precio*$descuento)/100);

                $ruta_carpeta= $row['imagen'];
                
                
                       
            }

            $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);//traeme el resultado de fetchAll(todos los productos) mediante PDO por FETCH_ASSOC(nombre de columna)
        }else{
            echo 'error';
            exit;
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
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
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a href="../admin/miniProyecto.php" class="nav-link active">INICIO</a>
                        </li>
                        <li class="nav-item">
                            <a href="" class="nav-link active">NOSOTROS</a>
                        </li>
                        <li class="nav-item">
                            <a href="index.php" class="nav-link active">TIENDA</a>
                        </li>
                        <li class="nav-item">
                            <a href="../admin/blog.php" class="nav-link active">BLOG</a>
                        </li>
                        <li class="nav-item">
                            <a href="" class="nav-link active">CONTACTANOS</a>
                        </li>
                    </ul> 
                    <a href="checkout.php" class="btn"> <img href="checkout.php" id="canasta" src="IMAGE/Iconos/canasta.png"><span id="num_cart" class="badge bg-secondary"><?php echo $num_cart; ?></span>
                    </a>
                </div>

            </div>
        </div>
    </header>

    <main>
        <div class="container">
            <div class="row" >
                <div class="col-md-5 order-md-1">
                    <img src="../catalogoAdmin/IMAGE/Productos/<?php echo $ruta_carpeta;?>" class="d-block w-100">
                </div>
                <div class="col-md-6 order-md-2 justify-content-between" style="margin-left: 95px;">
                    <h2><?php echo $titulo ?></h2>

                    <?php if($descuento>0){?>

                        <p><del><?php echo MONEDA . $precio; ?></del></p>
                        <h4>
                            <?php echo MONEDA . $precio_descuento; ?>
                            <small class="text-success"> <?php echo $descuento;?>% DESCUENTO</small>
                        </h4>
                    <?php }else{  ?>
                        <h4>
                            <?php echo MONEDA . $precio; ?>
                        </h4>
                    <?php } ?>

                    <P class="lead gap-3 col-10 ">
                        <?php
                            echo $descripcion;
                        ?>
                    </P>
                    <div class="d-grid gap-3 col-10">
                        <button class="btn btn-outline-secondary btn-light" type="button ">Comprar ahora</button>
                        
                        <button class="btn btn-outline-secondary btn-light" type="button" onclick="addProducto(<?php echo $id; ?>, '<?php echo $token_tmp;?>')">Agregar al carrito</button>

                    </div>
                </div>
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