<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Estilos/estiloMenu.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@400;600&display=swap" rel="stylesheet">
</head>
<body>
<div class="item2"><?php
    //Si ya existen las vairavbles de sesión ,se da la bienvenida al usuario
    if(!is_null($_SESSION["user"])) {
        echo '<p class="sess"> Hola '.$_SESSION["user"].'</p>';
    }
    
?></div>
<!--Se muestra un botón de logout-->
<a class="item3" href="logout.php">Salir</a>

<div class="menu">
    <ul class="elementos">
        <!--Se muestran las diferentes opciones en el menú -->
        <div class="item" ><p class="click" onclick="location.href='pInicial.php'">Inicio</p></div>
        <div class="item" ><p class="click" onclick="location.href='login.php'">Log-in</p></div>
        <div class="item" ><p class="click" onclick="location.href='grupos.php'">Grupos</p></div>
        <div class="item" ><p class="click" onclick="location.href='show.php'">Integrantes</p></div>
        <div class="item" ><p class="click" onclick="location.href='update.php'">Actualizar</p></div>
        <div class="item-2" ><p class="click" onclick="location.href=''">Discos</p></div>
        <div class="item-3" ><p class="click" onclick="location.href=''">Canciones</p></div>
    </ul>
</div>
</html
