<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Estilos/estiloHeader.css">
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>

<div class="header">
    <!--Se muestra el logo de la página-->
    <img class="logo" src="logo2.png" onclick="location.href='PInicial.php'">
    <ul class="elementos2">
        <!--Se crea un formulario que solo va a contener el cuadro de búsqueda-->
        <form action="busqueda.php" method="POST" float="left" class="search">
            <input class="bar" type="text" name="busqueda" placeholder="Búsqueda" float="left">
            <button type="submit" class="lupa"><i class="fa fa-search" style="font-size:18px"></i></button>
        </form>
    </ul>
</div>