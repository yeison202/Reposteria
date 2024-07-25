<?php 
 require_once '../controladores/controlador.php';
 
 function admin()
 {
    
 $admin="#0000#";
 if (!empty($_POST["enviar"]))
    {   if (empty($_POST["admin"])){
        echo '<script language="javascript">alert("DATOS VACIOS")</script>';
    }else{
        if($_POST['admin'] == $admin)
        {
            header('Refresh: 0.001; URL=../admin/inicio2.php');
        }else{
            echo '<script language="javascript">alert("NO ERES ADMINISTRADOR ")</script>';

        }


     }

    }

}
function esNulo(array $parametros)
{
    foreach ($parametros as $parametros){
        if(strlen(trim($parametros)) < 1){
            return true;
        }
    }
    return false;
}

function esEmail($email)
{
    if(filter_var($email, FILTER_VALIDATE_EMAIL))
    {
        return true;
    }
    return false;
}

function usuario_Exise($usuario,$con)
{ 
    $db= new DataBase();
    $con= $db->conectar();
    
    $sql=$con->prepare("SELECT id_registro FROM inicio2 WHERE usuario LIKE ? LIMIT 1");
    $sql->execute([$usuario]);
    if($sql->fetchColumn()>0){
        return true;
    }
    return false;

}
function usuario_Exise_Cliente($usuario,$con)
{ 
    $db= new DataBase();
    $con= $db->conectar();
    
    $sql=$con->prepare("SELECT id_inicio FROM inicio3 WHERE usuario_inicio LIKE ? LIMIT 1");
    $sql->execute([$usuario]);
    if($sql->fetchColumn()>0){
        return true;
    }
    return false;

}
function email_Exise($email,$con)
{ 
    $db= new DataBase();
    $con= $db->conectar();
    
    $sql=$con->prepare("SELECT id FROM registro WHERE correo LIKE ? LIMIT 1");
    $sql->execute([$email]);
    if($sql->fetchColumn()>0){
        return true;
    }
    return false;

}

function mostra_Mensaje(array $error)
{
    if(count($error) > 0)
    {
        echo '<div class="alert alert-warning alert-dismissible fade show" role="alert"><ul>';
        foreach($error as $error){
            echo '<li>' .$error . '</li>';
        }
        echo '<ul>'.'</div>';
    }
}


function registroCliente()
{
   
$db= new DataBase();//instanciamos la clase DataBase que esta en CONFIG
 
 $con= $db->conectar();
 $error=[];
 if (!empty($_POST["RegistrarCliente"]))
    {  
         if (empty($_POST["nombre"]) && empty($_POST["apellido"]) && empty($_POST["telefono"]) && empty($_POST["fecha"]) && empty($_POST["correo"]) && empty($_POST["usuario"]) && empty($_POST["contraseña"])){
        echo '<div class="alert">LOS CAMPOS ESTAN VACIOS</div>';
    }
    else{

        if(esNulo([$_POST['nombre'],$_POST['apellido'],$_POST['telefono'],$_POST['fecha'],$_POST['correo'],$_POST['usuario'],$_POST['contraseña']])){

            $error[]="Rellene todos los datos";

        }

        if(esEmail(!$_POST['correo'])){
            $error[]="Direccion de correo no valido";

        }

        if(usuario_Exise($_POST['correo'],$con)){
            $error[]="el correo '".$_POST['correo']."' ya esta registrado";
        }
        if(usuario_Exise_Cliente($_POST['usuario'],$con)){
            $error[]="el usuario '".$_POST['usuario']."' ya esta registrado";
        }

        if(count($error) !== 0){
            mostra_Mensaje($error);
        }else{

        if(isset($_POST['nombre'])&& isset($_POST['apellido']) && isset($_POST['telefono']) && isset($_POST['fecha']) && isset($_POST['correo']) && isset($_POST['usuario']) && isset($_POST['contraseña'])){


        $con->query("INSERT INTO inicio3(usuario_inicio,contraseña_inicio)VALUES('".$_POST['usuario']."','".$_POST['contraseña']."')");
        
        $con->query("INSERT INTO usuario(id_cliente)VALUES('".$con->lastInsertId()."')");    

        $con->query("INSERT INTO registro(nombre,apellido,telefono,fecha,correo,usuario_id)VALUES('".$_POST['nombre']."','".$_POST['apellido']."','".$_POST['telefono']."','".$_POST['fecha']."','".$_POST['correo']."','".$con->lastInsertId()."')");

            if($con==true){
                echo '<script language="javascript">alert("Usuario registrado correctamente")</script>';
            header('Refresh: 0.001; URL=../cliente/inicio.php');
            }else{
                echo '<script language="javascript">alert("Usuario no registrado ")</script>';
            }
            
        }
        }
    }
    }
    

    
}





function registro()
{
   
$db= new DataBase();//instanciamos la clase DataBase que esta en CONFIG
 
 $con= $db->conectar();
 $error=[];
 if (!empty($_POST["RegistrarAdm"]))

    {   if (empty($_POST["nombreAdm"]) && empty($_POST["apellidoAdm"]) && empty($_POST["telefonoAdm"]) && empty($_POST["fechaAdm"]) && empty($_POST["correoAdm"]) && empty($_POST["usuarioAdm"]) && empty($_POST["contraseñaAdm"])){
        echo '<div class="alert">LOS CAMPOS ESTAN VACIOS</div>';
    }
    else{

        if(esNulo([$_POST['nombreAdm'],$_POST['apellidoAdm'],$_POST['telefonoAdm'],$_POST['fechaAdm'],$_POST['correoAdm'],$_POST['usuarioAdm'],$_POST['contraseñaAdm']])){

            $error[]="Rellene todos los datos";

        }

        if(esEmail(!$_POST['correoAdm'])){
            $error[]="Direccion de correo no valido";

        }

        if(usuario_Exise($_POST['correoAdm'],$con)){
            $error[]="el correo '".$_POST['correo']."' ya esta registrado";
        }
        if(usuario_Exise($_POST['usuarioAdm'],$con)){
            $error[]="el usuario '".$_POST['usuarioAdm']."' ya esta registrado";
        }

        if(count($error) !==0){
            mostra_Mensaje($error);
        }else{

        if(isset($_POST['nombreAdm'])&& isset($_POST['apellidoAdm']) && isset($_POST['telefonoAdm']) && isset($_POST['fechaAdm']) && isset($_POST['correoAdm']) && isset($_POST['usuarioAdm']) && isset($_POST['contraseñaAdm'])){


        $con->query("INSERT INTO inicio2 (usuario,contraseña)VALUES('".$_POST['usuarioAdm']."','".$_POST['contraseñaAdm']."')");
        
        $con->query("INSERT INTO usuario(id_admin)VALUES('".$con->lastInsertId()."')");    
        
        $con->query("INSERT INTO registro(nombre,apellido,telefono,fecha,correo,usuario_id)VALUES('".$_POST['nombreAdm']."','".$_POST['apellidoAdm']."','".$_POST['telefonoAdm']."','".$_POST['fechaAdm']."','".$_POST['correoAdm']."','".$con->lastInsertId()."')");

            if($con==true){
                echo '<script language="javascript">alert("Usuario registrado correctamente")</script>';
            header('Refresh: 0.001; URL=../admin/inicio2.php');
            }else{
                echo '<script language="javascript">alert("Usuario no registrado ")</script>';
            }
            
        }
        }
    }
    }
    

    
}


function registrar_blog()
{
    $db= new DataBase();//instanciamos la clase DataBase que esta en CONFIG
 
 $con= $db->conectar();
    if (!empty($_POST["btn_enviar"]))
    {
        if($_FILES['imagen']['error']){

            switch($_FILES['imagen']['error']){

                case 1: //error exceso de tamaño de archivo
                    echo "el tamaño del archivo excede lo permitido al servidor";
                    break;
                case 2://error tamaño archivo marcado del formulario
                    echo "el tamaño de archivo excede 2 MB";
                    break;
                case 3: //corrupcion de archivo            
                    echo "el envio de archivo se interrumpio";            
                    break;
                case 4://no hay fichero            
                    echo "no se ha encontrado ningun archivo";
                    break;
            }

        }else{    

            if(isset($_FILES['imagen']['name']) && ($_FILES['imagen']['error']==UPLOAD_ERR_OK)){

                $destinoRuta="../directorio/";

                move_uploaded_file($_FILES['imagen']['tmp_name'], $destinoRuta . $_FILES['imagen']['name']);

                echo "el archivo".  $destinoRuta . $_FILES['imagen']['name'] . "se ha copiado en el drectorio de imagenes";

            }else{
                echo "el archivo no se a podido copiar al directorio de imagenes";
            }
                header("location:../admin/blog.php");
        }

        $elTitulo=$_POST['campo_titulo'];
        $laFecha=date("Y-m-d H:i:s");
        $elComentario=$_POST['area_comentarios'];
        $laimagen=$_FILES['imagen']['name'];

        $usuario=$_SESSION['usuario'];
        $clave=$_SESSION['contraseña'];

        $con->query("INSERT INTO formulario_blog(Titulo, Fecha, Comentario, Imagen)VALUES ('".$elTitulo."','".$laFecha."','".$elComentario."','".$laimagen."')");

        $con->query("INSERT INTO inicio2(usuario,contraseña,id_blog)VALUES('".$usuario."','".$clave."','".$con->lastInsertId()."')");

        if($con==true){
            echo '<script language="javascript">alert("datos agregados correctamente")</script>';
        header('Refresh: 0.001; URL=../admin/blog.php');
        }else{
            echo '<script language="javascript">alert("error ")</script>';
        }
        //echo "<br/>se ha agregado el comentario correctamente<br/><br/>";
    }
}

function eliminar(){
    $db= new DataBase();//instanciamos la clase DataBase que esta en CONFIG
 
 $con= $db->conectar();    
 if (!empty($_POST["eliminar"]) && !empty($_POST["id"])){

 $id=$_POST['id'];
$con->query("DELETE FROM formulario_blog WHERE `formulario_blog`.`id_formulario` = '".$id."'");

if($con==true){
    header('location:../admin/blog.php');
     }
 
}
}
function eliminar_Usuario(){
    $db= new DataBase();//instanciamos la clase DataBase que esta en CONFIG
 
 $con= $db->conectar();    
 if (!empty($_POST["eliminar"]) && !empty($_POST["id"])){

 $id=$_POST['id'];
$con->query("DELETE FROM inicio3 WHERE id_inicio = '".$id."'");

if($con==true){
    header('location:../Admin/perfil.php');
     }
 
}
}

function editar_Datos()
{
    $db= new DataBase();//instanciamos la clase DataBase que esta en CONFIG
 
 $con= $db->conectar();
if (!empty($_POST["controlEditarAdm"])) {
    if (!empty($_POST["nombre"]) && !empty($_POST["apellido"]) && !empty($_POST["telefono"]) && !empty($_POST["fecha"]) ) {
       

        $Nombre=$_POST["nombre"];
        $Apellido=$_POST['apellido'];
        $Telefono=$_POST['telefono'];
        $Fecha=$_POST['fecha'];
        
        $id=$_POST["id"];

        $sql=$con->query("UPDATE registro SET nombre='".$Nombre."',apellido='".$Apellido."', telefono='".$Telefono."',fecha='".$Fecha."' WHERE id='".$id."'");

        if ($sql==true) {
            
            echo '<script language="javascript">alert("DATOS MODIFICADOS")</script>';
            header('Refresh: 0.01; URL=../admin/perfil.php');

        } else {
            echo '<script language="javascript">alert("DATOS NO MODIFICADOS")</script>';
        }
        


    } else {
        echo '<script language="javascript">alert("CAMPOS VACIOS")</script>';
        header('Refresh: 0.01; URL=../editarAdmin/editarDatosAdm.php');

    }
    
}
}

function editar_Usuario()
{
    $db= new DataBase();//instanciamos la clase DataBase que esta en CONFIG
 
 $con= $db->conectar();
if (!empty($_POST["EditarUsuarioAdm"])) {

    if (!empty($_POST["usuario"]) && !empty($_POST["contraseña"])  ) {
       

        $usuario=$_POST["usuario"];
        $contraseña=$_POST["contraseña"];
        $id=$_POST["id"];

        $sql=$con->query("UPDATE inicio2 SET usuario='".$usuario."',contraseña='".$contraseña."' WHERE id_registro='".$id."' ");

        if ($sql==true) {
            echo '<script language="javascript">alert("DATOS MODIFICADOS")</script>';
        header('Refresh: 0.01; URL=../modulos/cerrar.php');
        } else {
            echo '<script language="javascript">alert("DATOS NO MODIFICADOS")</script>';
        }
        


    } else {
        echo '<script language="javascript">alert("CAMPOS VACIOS")</script>';
        header('Refresh: 0.01; URL= ../editarAdmin/editarUsuarioAdmin.php');

    }
    
}
}

function editar_Datos_cliente()
{
    $db= new DataBase();//instanciamos la clase DataBase que esta en CONFIG
 
 $con= $db->conectar();
if (!empty($_POST["controlEditarCliente"])) {
    if (!empty($_POST["nombre"]) && !empty($_POST["apellido"]) && !empty($_POST["telefono"]) && !empty($_POST["fecha"]) ) {
       

        $Nombre=$_POST["nombre"];
        $Apellido=$_POST['apellido'];
        $Telefono=$_POST['telefono'];
        $Fecha=$_POST['fecha'];
        
        $id=$_POST["id"];

        $sql=$con->query("UPDATE registro SET nombre='".$Nombre."',apellido='".$Apellido."', telefono='".$Telefono."',fecha='".$Fecha."' WHERE id='".$id."'");

        if ($sql==true) {
            
            echo '<script language="javascript">alert("DATOS MODIFICADOS")</script>';
            header('Refresh: 0.01; URL=../cliente/perfil2.php');

        } else {
            echo '<script language="javascript">alert("DATOS NO MODIFICADOS")</script>';
        }
        


    } else {
        echo '<script language="javascript">alert("CAMPOS VACIOS")</script>';
        header('Refresh: 0.01; URL=../editarCliente/editarDatosCliente.php');

    }
    
}
}

function editar_Usuario_Cliente()
{
    $db= new DataBase();//instanciamos la clase DataBase que esta en CONFIG
 
 $con= $db->conectar();
if (!empty($_POST["modificarUsuarioCliente"])) {

    if (!empty($_POST["usuario"]) && !empty($_POST["contraseña"])  ) {
       

        $usuario=$_POST["usuario"];
        $contraseña=$_POST["contraseña"];
        $id=$_POST["id"];

        $sql=$con->query("UPDATE inicio3 SET usuario_inicio='".$usuario."',contraseña_inicio='".$contraseña."' WHERE id_inicio='".$id."' ");

        if ($sql==true) {
            echo '<script language="javascript">alert("DATOS MODIFICADOS")</script>';
        header('Refresh: 0.01; URL=../modulos/cerrar.php');
        } else {
            echo '<script language="javascript">alert("DATOS NO MODIFICADOS")</script>';
        }
        


    } else {
        echo '<script language="javascript">alert("CAMPOS VACIOS")</script>';
        header('Refresh: 0.01; URL= ../editarCliente/editarUsuarioCliente.php');

    }
    
}
}

function Agregar_Producto()
{
    $db= new DataBase();//instanciamos la clase DataBase que esta en CONFIG
 
 $con= $db->conectar();
    if (!empty($_POST["btn_enviar"]))
    {
        if($_FILES['imagen']['error']){

            switch($_FILES['imagen']['error']){

                case 1: //error exceso de tamaño de archivo
                    echo "el tamaño del archivo excede lo permitido al servidor";
                    break;
                case 2://error tamaño archivo marcado del formulario
                    echo "el tamaño de archivo excede 2 MB";
                    break;
                case 3: //corrupcion de archivo            
                    echo "el envio de archivo se interrumpio";            
                    break;
                case 4://no hay fichero            
                    echo "no se ha encontrado ningun archivo";
                    break;
            }

        }else{    

            if(isset($_FILES['imagen']['name']) && ($_FILES['imagen']['error']==UPLOAD_ERR_OK)){
                

                $destinoRuta="../catalogoAdmin/IMAGE/Productos/";

                move_uploaded_file($_FILES['imagen']['tmp_name'], $destinoRuta . $_FILES['imagen']['name']);

                echo "el archivo".  $destinoRuta . $_FILES['imagen']['name'] . "se ha copiado en el drectorio de imagenes";

            }else{
                echo "el archivo no se a podido copiar al directorio de imagenes";
            }
                header("location:../catalogoAdmin/index.php");
        }
        $id=$_POST['id'];
        $elTitulo=$_POST['campo_titulo'];
        $elPrecio=$_POST['campo_Precio'];
        $elDescuento=$_POST['campo_Descuento'];
        $laFecha=date("Y-m-d H:i:s");
        $elComentario=$_POST['area_comentarios'];
        $laimagen=$_FILES['imagen']['name'];
        $Activo=$_POST['campo_Activo'];

        if(!empty($_POST["campo_Activo"])){
            $Activo=1;
            

        $con->query("INSERT INTO productos(id,titulo,precio,descuento,activo,Fecha, descripcion, imagen)VALUES ('".$id."','".$elTitulo."','".$elPrecio."','".$elDescuento."','".$Activo."','".$laFecha."','".$elComentario."','".$laimagen."')");

        $con->query("INSERT INTO inicio2(id_Productos)VALUES('".$con->lastInsertId()."')");

        if($con==true){
            echo '<script language="javascript">alert("datos agregados correctamente")</script>';
        header('Refresh: 0.001; URL=../admincatalogo/index.php');
        }else{
            echo '<script language="javascript">alert("error ")</script>';
        }
        //echo "<br/>se ha agregado el comentario correctamente<br/><br/>";
    }else{
    $Activo=0;
    $con->query("INSERT INTO productos(id,titulo,precio,descuento,activo,Fecha, descripcion, imagen)VALUES ('".$id."','".$elTitulo."','".$elPrecio."','".$elDescuento."','".$Activo."','".$laFecha."','".$elComentario."','".$laimagen."')");

        $con->query("INSERT INTO inicio2(id_Productos)VALUES('".$con->lastInsertId()."')");

        if($con==true){
            echo '<script language="javascript">alert("datos agregados correctamente")</script>';
        header('Refresh: 0.001; URL=../admincatalogo/index.php');
        }else{
            echo '<script language="javascript">alert("error ")</script>';
        }
        //echo "<br/>se ha agregado el comentario correctamente<br/><br/>";
    }
        }
          
    }


?>

