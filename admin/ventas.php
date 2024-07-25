<?php
require '../catalogo/CONFIG/config.php';
require '../controladores/controlador.php';

$db = new DataBase();
$con = $db->conectar();


$sql = $con->prepare('SELECT * FROM compra ORDER BY DATE(fecha) DESC');
$sql->execute();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>

    <link rel="stylesheet" href="../CSS1/estilospagina.css">

</head>

<body>
    <header>
        <div class="navbar navbar-expand-lg">
            <div class="container">
                <a href="#" class="navbar-brand" id="logo">
                    <img src="../wed/imagenes/logotipoabuela.png">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarHeader"
                    aria-controls="navbarHeader" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarHeader">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">

                        <li class="nav-item">
                            <a href="miniProyecto.php" class="nav-link active">INICIO</a>
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

    <main>
    <?php
        include('../reportes/BD/conexionbd.php');
        $sqlventas = 'SELECT * FROM detalle_compra';
    ?>
        <div class="container">
            <div class="reporte"> <a href="../reportes/reporteventas.php" target = "_blank">
                    <h4>Reporte de Ventas</h4>
                </a></div>

            <h4>Ventas</h4>
            <hr>
            <?php while ($row = $sql->fetch(PDO::FETCH_ASSOC)) { ?>
                <div class="card">
                    <div class="card-header">

                        Usuario:
                        <?php echo $row['id_cliente']; ?><br>

                        <?php echo $row['fecha']; ?>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">Filio:
                            <?php echo $row['id_transaccion']; ?>
                        </h5>
                        <p class="card-text">Total:
                            <?php echo $row['total']; ?> $
                        </p>
                        <a href="detalles_ventas.php?orden=<?php echo $row['id_transaccion']; ?>" class="btn btn-primary">Ver
                            Ventas</a>
                        <a href="../reportesAdmin/reportefacturas.php?orden=<?php echo $row['id_transaccion']; ?>" target = "_blank" class="btn btn-primary">Factura</a>
                    </div>
                </div>
            <?php } ?>
        </div>
    </main>

</body>

</html>