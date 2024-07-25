<?php
    require 'CONFIG/config.php';
    require '../controladores/controlador.php';
    
    $db= new DataBase();//instanciamos la clase DataBase que esta en CONFIG
    $con= $db->conectar();

    $productos= isset( $_SESSION['carrito']['productos']) ?  $_SESSION['carrito']['productos'] : null;
    $lista_carrito= array();

    if($productos != null)
    {
        foreach($productos as $clave=> $cantidad)//clave= id del producto cantidad= cantidad de productos
        {
            $sql= $con->prepare("SELECT id, titulo, precio, descuento, $cantidad AS cantidad FROM productos WHERE id=? AND activo=1");
            $sql->execute([$clave]);
            $lista_carrito[]=$sql->fetch(PDO::FETCH_ASSOC);//traeme el resultado de fetchAll(todos los productos) mediante PDO por FETCH_ASSOC(nombre de columna)

        }
    }

   
    //session_destroy();
    //print_r($_SESSION);
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
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a href="../admin/miniProyecto.php" class="nav-link active">INICIO</a>
                        </li>
                        <li class="nav-item">
                            <a href="index.php" class="nav-link active">TIENDA</a>
                        </li>
                        <li class="nav-item">
                            <a href="../admin/ventas.php" class="nav-link active">VENTAS</a>
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
                    <a href="checkout.php" class="btn"> <img id="canasta" src="IMAGE/Iconos/canasta.png"><span id="num_cart" class="badge bg-secondary"><?php echo $num_cart; ?></span>
                    </a>
                </div>

            </div>
        </div>
    </header>

    <main>
        <div class="container">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Producto</th>
                            <th>Precio</th>
                            <th>Cantidad</th>
                            <th>Subtotal</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if($lista_carrito==null)
                        {
                            echo'<tr><td colspan="5" class="text-center"><b>Lista vacia</b></td></tr>';
                        }else{
                            $total=0;

                            foreach($lista_carrito as $producto)
                            {
                                $_id= $producto['id'];
                                $titulo= $producto['titulo'];
                                $precio= $producto['precio'];
                                $descuento= $producto['descuento'];
                                $cantidad= $producto['cantidad'];
                                $precio_descuento=$precio-(($precio*$descuento)/100);
                                $subtotal= $cantidad*$precio_descuento;
                                $total += $subtotal;   
                       ?>
                        <tr>
                            <td><?php echo $titulo;?></td>
                            <td><?php  echo MONEDA.number_format($precio_descuento,2,'.',',');?></td>
                            <td>
                                <input type= "number" min="1" max="10" step="1" value="<?php echo $cantidad?>" size="5" id="catidad_<?php echo $_id;?>" onchange="actualizaCantidad(this.value, <?php echo $_id;?>)">
                                <!-- this.value es el valor que va a tener el input, le vamos a pasar con php y un echo el _id id el producto el cual deseamos actualizar su cantidad estos dos valores los vamos a pasar mediante js-->
                            </td>
                            <td>
                                <div id="subtotal_<?php echo $_id;?>" name="subtotal[]">
                                <?php echo MONEDA.number_format($subtotal,2,'.',',');?>
                                </div>
                            </td>
                            <td><a href="#" id="eliminar" class="btn btn-outline-danger btn-sm" data-bs-id="<?php echo $_id; ?>" data-bs-toggle="modal" data-bs-target="#eliminarModal">Eliminar</a></td>
                        </tr>
                        <?php }?>

                        <tr>
                            <td colspan="3" ><b>TOTAL</b></td>
                            <td colspan="2" >
                            <p class="h5" id="total"><?php  echo MONEDA.number_format($total,2,'.',',');?></p>
                            </td>
                        </tr>
                    </tbody>
                    <?php }?>
                </table>
            </div>

           <?php if($lista_carrito != null) {?>
                <div class="row"> 
                    <div class="col-md-5 offset-md-7 d-grid gap-2">
                        <a href="pago.php" class="btn btn-dark btn-md">REALIZAR PAGO</a>
                    </div>
                </div>
            <?php } ?>
        </div>
    </main>


    <!-- Modal -->
    <div class="modal fade" id="eliminarModal" tabindex="-1" aria-labelledby="eliminarModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="eliminarModalLabel">Advertencia</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
        Se eliminara el producto de la lista
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            <button id= "btn-eliminar" type="button" onclick="eliminar()" class="btn btn-danger">Eliminar</button>
        </div>
        </div>
    </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

    <script>//vamos a enviar  mediante ajax para actualizar en tiempo real los datos del carrito. Vamos a usar una api llamada  fetch que nos proporciona js


            let eliminaModal=document.getElementById('eliminarModal')
            eliminaModal.addEventListener('show.bs.modal', function(event){
            let button= event.relatedTarget
            let id= button.getAttribute('data-bs-id')
            let buttonElimina= eliminaModal.querySelector('.modal-footer #btn-eliminar')
            buttonElimina.value= id
        })


        function eliminar()
        {
            let botonElimina=document.getElementById('btn-eliminar')
            let id = botonElimina.value
            let url = 'CLASES/actualizar_carrito.php'//scrip donde vamos a hacer las transacciones
            let formData = new FormData()  
            //nos va a ayudar a enviar los parametros mediante metodo post
            formData.append('action', 'eliminar')
            formData.append('id', id)//enviamos id a la variable id va a ser un metodo post

            fetch(url,
            { 
                //enviamos la url hacia donde vamos a enviar datos
                //aqui vamos a enviar algunas configuraciones o propiedades para el evento fetch
                method:'POST',
                body: formData,
                mode:'cors'
            })
            .then(response => response.json()) 
            //aqui nos regresa el resultado
            .then(data =>
            {
                if(data.ok)
                {
                    location.reload()
                }
            })
        }



        function actualizaCantidad(cantidad, id)//recibe cantidad y id
        {
            let url= 'CLASES/actualizar_carrito.php'//scrip donde vamos a hacer las transacciones
            let formData= new FormData()  
            //nos va a ayudar a enviar los parametros mediante metodo post
            formData.append('action', 'agregar')
            formData.append('id', id)//enviamos id a la variable id va a ser un metodo post
            formData.append('cantidad', cantidad) 

            fetch(url,
            { 
                //enviamos la url hacia donde vamos a enviar datos
                //aqui vamos a enviar algunas configuraciones o propiedades para el evento fetch
                method:'POST',
                body: formData,
                mode:'cors'
            }).then(response => response.json()) 
            //aqui nos regresa el resultado
            .then(data =>
            {
                if(data.ok)//validamos que el data.ok de actualizar_carrito sea true
                {
                    let divsubtotal = document.getElementById('subtotal_' + id)
                    divsubtotal.innerHTML= data.sub//este data . sub viene de la respuesta de la peticion ajax ($datos['sub']) de actualizar_carrito

                    let total= 0.00
                    let  list= document.getElementsByName('subtotal[]')

                    for(let i=0; i<list.length; i++){//con el for recorremos todos los elementos de subtotal
                        total += parseFloat(list[i].innerHTML.replace(/[$,]/g, ''))
                    }//total += para acumulaR y le quitamos los simbolos y decimales para poderlo sumar
                    total = new Intl.NumberFormat('en-US',{//aqui le volvemos a poner el formato con decimales y coma
                        minimumFractionDigits: 2
                    }).format(total)
                    document.getElementById('total').innerHTML= '<?php echo MONEDA;?>'+ total//aqui le volvemos a poner el simbolo $
                    
                }
            })
        }
    </script>
</body>
</html>