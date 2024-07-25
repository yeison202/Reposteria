<?php
 require '../CONFIG/config.php';
 require '../../controladores/controlador.php';
 $db= new DataBase();//instanciamos la clase DataBase que esta en CONFIG
 $con= $db->conectar();

 $json= file_get_contents('php://input');
 $datos= json_decode($json, true);

 print_r($datos);

 if(is_array($datos)){
    
    $id_transaccion= $datos['detalles']['id'];
    $total= $datos['detalles']['purchase_units'][0]['amount']['value'];
    $status= $datos['detalles']['status'];
    $fecha= $datos['detalles']['update_time'];
    $fecha_nueva= date('Y-m-d H:i:s', strtotime($fecha));
    $email= $datos['detalles']['payer']['email_address'];
    $id_cliente= $datos['detalles']['payer']['payer_id'];

    $sql= $con->prepare("INSERT INTO compra(id_transaccion, fecha, status, email, id_cliente, 	total) VALUES(?,?,?,?,?,?)");
    $sql->execute([$id_transaccion,$fecha_nueva,$status, $email, $id_cliente,  $total]);
    $id= $con->lastInsertId();

    if($id>0)
    {
        $productos= isset( $_SESSION['carrito']['productos']) ?  $_SESSION['carrito']['productos'] : null;

        if($productos != null)
    {
        foreach($productos as $clave=> $cantidad)//clave= id del producto cantidad= cantidad de productos
        {
            $sql= $con->prepare("SELECT id, titulo, precio, descuento FROM productos WHERE id=? AND activo=1");
            $sql->execute([$clave]);
            $row_prod =$sql->fetch(PDO::FETCH_ASSOC);//traeme el resultado de fetchAll(todos los productos) mediante PDO por FETCH_ASSOC(nombre de columna)

            $precio= $row_prod['precio'];
            $descuento= $row_prod['descuento'];
            $precio_descuento=$precio-(($precio*$descuento)/100);

            $sql_insert= $con->prepare("INSERT INTO detalle_compra(	id_compra, id_producto, titulo, precio, cantidad) VALUES(?,?,?,?,?)");
            $sql_insert->execute([$id,$clave,$row_prod['titulo'],$precio_descuento,$cantidad]);

        }
    }
    unset( $_SESSION['carrito']);
    }
 }

?>