<?php
require '../CONFIG/config.php';
require '../../controladores/controlador.php';

//Hacemos una validacion por isset para verificar que nos esten envianfo por metodo post ona opcion que diga action
if(isset($_POST['action']))//agregamos un nuevo post llamafdo action
{
    $action = $_POST['action'];
    $id = isset( $_POST['id']) ?  $_POST['id'] : 0;//si existe el id entonces envia por metodo post el id sino existe entonces asignale un 0

    if($action == 'agregar')//si action es igual a la opcion de agregar entonces realiza lo siguientes actividades
    {
        $cantidad= isset($_POST['cantidad']) ? $_POST['cantidad'] : 0;//recibir la cantidad
        $respuesta= agregar($id, $cantidad);
        if($respuesta>0)
        {
            $datos['ok']=true;//si encuentra inf
        }
        else
        {
            $datos['ok']=false;//sino encuentra info
        }
        $datos['sub']= MONEDA.number_format($respuesta, 2,'.', ',');
    }
    else if($action=='eliminar')
    {
        $datos['ok']=eliminar($id);
    }
    else
    {
        $datos['ok']=false;//sino llega el agregar
    }
}
else
{
    $datos['ok']=false;//sino llega el action
}
echo json_encode($datos);//esta funcion regresa la peticion


    
function agregar($id, $cantidad)
{
    $res = 0;//variable de respuesta
    if($id > 0 && $cantidad > 0 && is_numeric(($cantidad))) //si id=0 y cantidad=0 y cantidaf es numerica
    {
        //vamos a buscar si existe el id del producto en la variable de SESSION que es la del carrito de compras
        if(isset($_SESSION['carrito']['productos'][$id])) //con esto verificamos q la id del producto exista
        {
            $_SESSION['carrito']['producto'][$id]=$cantidad; //en caso de q si exista vamos a pasarle la variable $cantidad para q actualice nuestro carrito d compras

            //como necesitamos actualizar el total y el subtotal vamos a traer de la base de datos para hacer nuevamente los calculos
            $db= new DataBase();
            $con= $db->conectar();

            $sql = $con->prepare("SELECT precio, descuento FROM productos WHERE id=? AND activo=1 LIMIT 1");//funcion para consultar, aqui solo consultamos precio y descuento
            $sql->execute([$id]);//le enviamos el id para que se ejecute

            $row= $sql->fetch(PDO::FETCH_ASSOC);//esto nos va a regresar una fila
            $precio= $row['precio'];//recibimos el precio y el descuento
            $descuento= $row['descuento'];
            $precio_descuento=$precio-(($precio*$descuento)/100);
            $res= $cantidad*$precio_descuento;

            return $res;
        }
    }
    else
    {
        return $res; //Si  if($id>0 && $cantidad>0 && is_numeric(($cantidad))) retorn a res y como no  ingreso res vale 0
    }
}


function eliminar($id)
{
    if($id>0)
    {
        if(isset($_SESSION['carrito']['productos'][$id]))
        {
           unset ($_SESSION['carrito']['productos'][$id]);
            return true;

        }
        else
        {
            return false;
        }
    }
}
?>