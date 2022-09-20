<?php
//Se llama al header y al menú sin variables de sesion
require_once('header1.php');
require_once('header2.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Estilos/estiloRegistrar.css">
    <br><br><br><br>
    <title>Login</title>
</head>


<body>
    <div class="login">
        <h1 class="lable">Log-in</h1>
        <div>
            <!--Se crea un formulario para poder enviar a logger y poder acceder con una cuenta ya existente-->
            <form action="Logger.php" method="POST">
                <lable class="hi">Usuario</lable><br>
                <input class="cuadro" type="text" name="usuario">
                <br><br>
                <lable class="hi">Contraseña</lable><br>
                <input class="cuadro" type="password" name="password">
                <br><br><br>
                <input class="button" type="submit">
                <!--Se agrega un botón que lleve al registro de cuentas en caso de que no se tenga una cuenta ya creada-->
                <a class="hi2" href="registrar.php">Registrar usuario</a>
            </form>
        
        </div>
    </div>

</body>
</html>