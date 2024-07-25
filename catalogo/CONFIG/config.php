<?php
    define("CLIENT_ID", "AUtLp5ZscAcDwUb4ANwNgTqUSpYHRO6WdowMrtKB7r6gwNwypFHyvS8WXtfsYJ_-bpQHUu5ENlkaMzt_");
    define("CURRENCY", "USD");

    define("KEY_TOKEN", "APR.wqc-354*");//password para cifrar informacion
    define("MONEDA","$");

    $num_cart=0;
    if(isset($_SESSION['carrito']['productos'])){
        $num_cart= count($_SESSION['carrito']['productos']);
    }
?>