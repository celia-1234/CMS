<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cormorant:ital,wght@0,300..700;1,300..700&family=Gruppo&family=Italiana&family=Nixie+One&family=Poiret+One&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="../css/externo.css" />
    <link rel="stylesheet" href="../css/customForm.css" />
    <link rel="stylesheet" href="../css/style.css" />
    <title>Sesión finalizada</title>
    <link rel="icon" type="image/x-icon" href="../media/img_configuracion.png">
</head>
<body>

<div class="controlSesion">
    <?php
    session_start();
    
    echo "<h3>Has cerrado correctamente la sesión</h3>";

    session_unset();
    session_destroy();

?>

    <a href="./login.php">Iniciar sesión</a>

</div>
    
</body>
</html>