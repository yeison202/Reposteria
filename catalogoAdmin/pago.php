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
    }else{
        header("Location: index.php");
        exit;
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
                            <a href="" class="nav-link active">NOSOTROS</a>
                        </li>
                        <li class="nav-item">
                            <a href="index.php" class="nav-link active">TIENDA</a>
                        </li>
                        <li class="nav-item">
                            <a href="" class="nav-link active">BLOG</a>
                        </li>
                        <li class="nav-item">
                            <a href="" class="nav-link active">CONTACTANOS</a>
                        </li>
                    </ul> 
                    <a href="checkout.php" class="btn"> <img id="canasta" src="IMAGE/Iconos/canasta.png"><span id="num_cart" class="badge bg-secondary"><?php echo $num_cart; ?></span>
                    </a>
                </div>

            </div>
        </div>
    </header>

<main>
    <div class="container">
        <div class="row">
            <div class="col-5">
                <h4>Detalles de pago</h4>
                <div id="paypal-button-container"></div>
            </div>

            <div class="col-7">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Producto</th>
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

                                <td colspan="2">
                                    <div id="subtotal_<?php echo $_id;?>" name="subtotal[]">
                                    <?php echo MONEDA.number_format($subtotal,2,'.',',');?>
                                    </div>
                                </td>
                            </tr>
                            <?php }?>

                            <tr>
                                <td><b>TOTAL</b></td>
                                <td colspan="2" >
                                <p class="h5" id="total"><?php  echo MONEDA.number_format($total,2,'.',',');?></p>
                                </td>
                            </tr>
                        </tbody>
                        <?php }?>
                    </table>
                </div>
            </div>
        </div>
    </div>
</main>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

<script src="https://www.paypal.com/sdk/js?client-id=<?php echo CLIENT_ID;?>&currency=<?php echo CURRENCY;?>"></script>

<script>
        paypal.Buttons(
        {
            style:
            {
                color:'blue',
                shape: 'pill',
                label: 'pay'
            },
            createOrder: function(data, actions)
            {
                return actions.order.create(
                {
                    purchase_units:[
                    {
                        amount:
                        {
                            value: <?php echo $total;?>
                        }
                    }]

                });
        },
        onApprove: function(data, actions)
        {
            let URL= 'CLASES/captura.php'
            actions.order.capture().then(function (detalles)
            {
                console.log(detalles)

                let url='CLASES/captura.php'
                
                return fetch(url,
                {
                    method: 'post',
                    headers: 
                    {
                        'content-type': 'application/json'
                    },
                    body: JSON.stringify
                    ({
                        detalles: detalles
                    })

                }).then(function(response){
                    window.location.href="completo.php";
                })
            });
        },
        onCancel: function(data)
        {
            alert("Pago cancelado");
            console.log(data);
        }
    }).render('#paypal-button-container');
</script>
  
</body>

</html>