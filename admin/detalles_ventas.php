<?php 
require '../catalogoadmin/CONFIG/config.php';
require '../controladores/controlador.php';
$orden=$_GET['orden']??null;
$db= new DataBase();
$con=$db->conectar();

$sqlcompra=$con->prepare('SELECT * FROM compra WHERE id_transaccion =? LIMIT 1');
$sqlcompra->execute([$orden]);
$rowcompra = $sqlcompra->fetch(PDO::FETCH_ASSOC);
$idcompra=$rowcompra['id'];

$sqldetalles=$con->prepare('SELECT * FROM detalle_compra WHERE id_compra =?');
$sqldetalles->execute([$idcompra]);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
   
    <link rel="stylesheet" href="../CSS1/estilospagina.css">

</head>
   
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
                            <a href="miniProyecto.php" class="nav-link active">INICIO</a>
                        </li>
                        <li class="nav-item">
                            <a href="ventas.php" class="nav-link active">VENTAS</a>
                        </li>
                        
                        <li class="nav-item">
                            <a href="../catalogoAdmin/index.php" class="nav-link active">CATALOGO</a>
                        </li>
                        
                       
                    </ul> 
                   
                    </a>
                </div>

            </div>
        </div>
    </header> 

    <body> 
    <main>
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-4">
                    <div class="card md-3">
                        <div class="card-header">
                            <strong>Detalles de la compra</strong>
                        </div>
                        <div class="card-body">
                         <p><strong>Usuario: </strong><?php echo $rowcompra['id_cliente'];?></p>
                            <p><strong>Fecha: </strong><?php echo $rowcompra['fecha'];?></p>
                            <p><strong>Orden: </strong><?php echo $rowcompra['id_transaccion'];?></p>
                            <p><strong>Total: </strong><?php echo MONEDA . number_format( $rowcompra['total'],2,'.',',');?></p>
                        </div>
                    </div>
                </div>
            
                <div class="col-12 col-md-8">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Producto</th>
                                    <th>Precio</th>
                                    <th>Cantidad</th>
                                    <th>SubTotal</th>
                                   
                                </tr>
                            </thead>

                            <tbody>
                                <?php while($row=$sqldetalles->fetch(PDO::FETCH_ASSOC)){
                                    $precio=$row['precio'];
                                    $cantidad=$row['cantidad'];
                                    $subtotal=$precio * $cantidad;
                                    ?>
                                    <tr>
                                        <td><?php echo $row['titulo']?></td>
                                    
                                        <td><?php echo MONEDA . number_format($precio,2,'.',',') ?></td>
                                    
                                        <td><?php echo $cantidad ?></td>
                                    
                                        <td><?php echo MONEDA .''. number_format($subtotal,2,'.',',') ?></td>

                                    </tr>
                                   <?php }?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </main>


        
</body>
</html>