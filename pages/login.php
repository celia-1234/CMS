<?php 
session_start();

if(isset($_SESSION['nombre_u'])){
    header("location: ../index.php");
    exit();
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cormorant:ital,wght@0,300..700;1,300..700&family=Gruppo&family=Italiana&family=Nixie+One&family=Poiret+One&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="../css/style.css" />
    <link rel="stylesheet" href="../css/customForm.css" />
    <title>Inicio de sesión</title>
    <link rel="icon" type="image/x-icon" href="../media/img_configuracion.png">
</head>
<body>

<h1>¡Quieto parao!</h1>
<p>Debes iniciar sesión para poder acceder a este maravilloso sitio.</p>

<form action="./control-sesion.php" class="customForm loginForm" method="POST">
    
    <div class="seccion_form login">
        <h3>Datos de usuario</h3>

        <div class="campo">
          <label for="nombre_u">Nombre de usuario</label>
          <input type="text" name="nombre_u" id="nombre_u" placeholder="Usuario">
        </div>

        <div class="campo">
          <label for="contra_u">Contraseña</label>
          <input type="password" name="contra_u" id="contra_u">
        </div>

        <div class="campo campo_submit">
          <input type="submit" name="enviar" value="Iniciar sesión">
        </div>
    </div>

</form>


</body>
</html>