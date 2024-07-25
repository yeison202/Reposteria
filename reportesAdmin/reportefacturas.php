<?php
include('reporteGeneral.php');

define('MONEDA', '€'); // Define la constante MONEDA con el símbolo de euro (€) o el símbolo de la moneda que desees usar

$pdf = new PDF();
$pdf->AddPage();
$pdf->AliasNbPages();

// Conecta a tu base de datos
$server = '127.0.0.1';
$user = 'root';
$pass = '';
$bd = 'inicio';

$mysqli = new mysqli($server, $user, $pass, $bd);
if ($mysqli->connect_error) {
    die('Error de conexión: ' . $mysqli->connect_error);
}
$order_id = $_GET['orden'];

// Consulta los detalles de compra para el cliente actual
$query = "SELECT c.id_cliente, c.fecha, c.id_transaccion, c.total, d.cantidad, d.titulo, d.precio 
FROM compra c
INNER JOIN detalle_compra d ON c.id = d.id_compra
WHERE c.id_transaccion = '$order_id'";

$result = $mysqli->query($query);

// Verifica si se encontraron resultados
if ($result->num_rows > 0) {
// Obtiene los datos del cliente
$rowCliente = $result->fetch_assoc();

// Inserta los datos del cliente en el informe
$pdf->SetFont('courier', 'B', 15);
$pdf->Cell(0, 10, 'FACTURA DE VENTA', 0, 1, 'C');
$pdf->Cell(0, 2);
$pdf->Ln();

$pdf->Cell(0, 3, '', 'B', 1);

$pdf->SetFont('courier', 'BI', 12);
$pdf->Cell(25, 5, 'Cliente:',0, 0, 'L');
$pdf->SetFont('Courier','I', 10);
$pdf->Cell(30, 5, '' . $rowCliente['id_cliente'], 0, 0, 'L');


$pdf->SetFont('courier', 'BI', 12);
$pdf->Cell(95, 5, 'Orden:',0, 0, 'R');
$pdf->SetFont('Courier','I', 10);
$pdf->Cell(30, 5, '' . $rowCliente['id_transaccion'], 0, 1);

$pdf->SetFont('courier', 'BI', 12);
$pdf->Cell(25, 5, 'Fecha:',0, 0, 'L');
$pdf->SetFont('Courier','I', 10);
$pdf->Cell(0, 5, '' . $rowCliente['fecha'], 0, 1);

// Inserta una línea antes de la tabla de detalles
$pdf->Cell(0, 3, '', 'B', 1);
$pdf->Cell(0, 3, '', 'B', 1);

// Encabezados de la tabla de detalles
$pdf->SetFont('courier', 'B', 12);
$pdf->SetFillColor(170, 255, 195);
$pdf->Cell(20, 10, 'CANT', 0, 0, 'C', 1);
$pdf->Cell(100, 10, 'PRODUCTO', 0, 0, 'C', 1);
$pdf->Cell(30, 10, 'PRECIO', 0, 0, 'C', 1);
$pdf->Cell(40, 10, 'SUBTOTAL', 0, 0, 'C', 1);
$pdf->Ln();

$pdf->SetFont('courier', '', 12);

$query = "SELECT titulo, cantidad, precio 
        FROM detalle_compra 
        INNER JOIN compra ON compra.id = detalle_compra.id_compra
        WHERE 
        compra.id_transaccion = '$order_id'";
$result = $mysqli->query($query);


while ($rowDetalle = $result->fetch_assoc()) {
    $cantidad = $rowDetalle['cantidad'];
    $titulo = $rowDetalle['titulo'];
    $precio = $rowDetalle['precio'];
    $subtotal = $cantidad * $precio;

    $pdf->Cell(20, 5, $cantidad, 0, 0, 'C');
    $pdf->Cell(100, 5, $titulo, 0, 0, 'L');
    $pdf->Cell(30, 5, $precio . '$', 0, 0, 'C');
    $pdf->Cell(40, 5, $subtotal . '$', 0, 0, 'C'); // Muestra el subtotal
    $pdf->Ln();
}

// Línea
$pdf->Cell(0, 3, '', 'B', 1);
}
$pdf->Ln();
$pdf->SetFont('courier', 'BI', 12);
$pdf->Cell(185, 5, 'Total: ' . number_format($rowCliente['total'], 2, '.', ','), 0, 0, 'R');
$pdf->Cell(5, 5, '$', 0);



$pdf->Output();

/*
Codigo sobrante UwU
// Realiza una consulta para obtener la lista de clientes
$queryClientes = "SELECT id_cliente FROM compra WHERE id_transaccion = '$order_id'";

$resultClientes = $mysqli->query($queryClientes);

// Itera a través de los clientes y genera un informe para cada uno
while ($rowCliente = $resultClientes->fetch_assoc()) {
    $idCliente = $rowCliente['id_cliente'];

    
}

$pdf->Output();
*/
?>