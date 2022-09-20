<?php
//Se muestran el header y menú sin datos de la sesión ya que aún no existen
require_once('header1.php');
require_once('header2.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar</title>
    <link rel="stylesheet" href="Estilos/estiloRegistrar.css">
    <br><br><br><br><br>
    <title>Registrar</title>
</head>
<body>
<div class="container">
<h1 class="lable">Registrar</h1>
    <div>
        <!--Se pide que se ingrese un nuevo nombre de usuario y contraseña, que serán enviadas al logger para ser almacenadas dentro de la base de datos-->
        <form action="Logger.php" method="POST">
            <lable class="hi">Usuario</lable><br>
            <input class="cuadro" type="text" name="usuario">
            <br><br>
            <lable class="hi">Contraseña</lable><br>
            <input class="cuadro" type="text" name="password">
            <br><br><br>
            <!--Se crea una bandera que avise al sistema (o al Logger) que se está creando una cuenta nueva-->
            <input type="hidden" name="band" value="1">
            <input class="button" type="submit">
            <!--Se muestra un botón para volver al login-->
            <a  class="hi3" href="login.php">Ir a loggin</a>
        </form>
        
    
    </div>
</div>
</body>
</html>