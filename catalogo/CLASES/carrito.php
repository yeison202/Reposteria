<?php
    require '../CONFIG/config.php';
    require '../../controladores/controlador.php';

    $datos = array(); // Inicializa un arreglo para almacenar los datos de respuesta

    if(isset($_POST['id']))
    {
        $id = $_POST['id'];
        $token = $_POST['token'];
        $token_tmp = hash_hmac('sha1', $id, KEY_TOKEN);
    
        if($token == $token_tmp)
        {
            if(isset($_SESSION['carrito']['productos'][$id]))
            {
                $_SESSION['carrito']['productos'][$id] += 1;
            }
            else
            {
                $_SESSION['carrito']['productos'][$id] = 1;
            }
    
            // Calcular la cantidad total de productos en el carrito
            $totalProductos = array_sum($_SESSION['carrito']['productos']);
            $datos['numero'] = $totalProductos;
            $datos['ok'] = true;
        }
        else
        {
            $datos['ok'] = false;
        }
    }
    else
    {
        $datos['ok'] = false;
    }
    
    // Devuelve la respuesta como JSON
    header('Content-Type: application/json');
    echo json_encode($datos);
?>