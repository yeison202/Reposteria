<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Blog </title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
      
    <link rel="stylesheet" href="../CSS1/estilos_blog_tema.css">

</head>
<body>    
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
                            <a href="../admin/miniProyecto.php" class="nav-link active">PAGINA DE INICIO</a>
                        </li>
                        <li class="nav-item">
                            <a href="index.php" class="nav-link active">VER CATALOGO</a>
                        </li>
                       
                    </ul> 
                   
                    </a>
                </div>

            </div>
        </div>
    </header>

<body>
<form action="" method="post" enctype="multipart/form-data" name="form1">
<table >
<input type="text" name="id" id="id" hidden>

  <tr>
      <td>Título: 
        <label for="campo_titulo"></label>
      </td>
        <td>
          <input type="text" name="campo_titulo" id="campo_titulo" >
        </td>
  </tr>
  <tr>
      <td>Precio: 
        <label for="campo_Precio"></label>
      </td>
        <td>
          <input type="text" name="campo_Precio" id="campo_Precio" >
        </td>
  </tr>
  <tr>
      <td>Descuento: 
        <label for="campo_Descuento"></label>
      </td>
        <td>
          <input type="text" name="campo_Descuento" id="campo_Descuento" >
        </td>
  </tr>
  <tr>
      <td>Activo: 
        <label for="campo_Activo"></label>
      </td>
        <td>
            <input type="checkbox" name="campo_Activo" id="campo_Activo">
            
        </td>
        
  </tr>

  <tr>
      <td>Comentarios: 
        <label for="area_comentarios"></label>
      </td>

      <td>
        <textarea name="area_comentarios" id="area_comentarios" rows="10" cols="50" ></textarea>
      </td>
  </tr>
        <input type="hidden" name="MAX_TAM" value="2097152">
   <tr>
      <td colspan="2" align="center">Seleccione una imagen con tamaño inferior a 2 MB</td>
  </tr>

  <tr>
        <td colspan="2" align="left"><input type="file" name="imagen" id="imagen" class="imagen"></td>
  </tr>

  <tr>
        <td colspan="2" align="center">  
        <input type="submit" name="btn_enviar" id="btn_enviar" value="Agregar"></td>
  </tr>

  
  
  </table>
</form>
<p>&nbsp;</p>
<?php 
 require_once '../controladores/funciones.php';
 Agregar_Producto();
 ?>
</body>
</html>
