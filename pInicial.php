<?php
//Se revisan las variables de sesion
session_start();
if(!isset($_SESSION["user"]))
{
    //Si no se han creado, la página no mostrará los datos de sesión ya que no existen (header2)
    require_once('header1.php');
    require_once('header2.php');
} else {
    //Si los datos de sesión ya existen, éstos sí se mostrarán en el menú
    require_once('header1.php');
    require_once('menu.php');
}
//Se llama al header y al menú
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Estilos/estiloInicial.css">
    <title>Inicio</title>
</head>
<body>
    <!--Se muestra la imagen de la pantalla principal-->
    <img src="img/osaka4.jpg" width="100%">
    <div class="grupos">
        <?php
            //Se conecta a la base de datos y se selecciona el nombre de todos los grupos en el sistema
            $enlace = mysqli_connect("127.0.0.1", "root", "", "grupos");
            $lista = array();
            if ($resultado = $enlace->query("SELECT Nombre FROM tgrupos")) 
            {
                while($row = $resultado->fetch_object())
                {
                    $lista[] = $row->Nombre;
                }
                $resultado->close();
            }

            $grupos = $lista;

            //Por cada grupo se mostrará solo el nombre y la foto dentro de un div
            foreach($grupos as $gr){
                $resultado = $enlace->query("SELECT Foto FROM tgrupos WHERE Nombre ='$gr'");
                $row = $resultado->fetch_object();
                echo "<div class='cuadro'><img class='foto' src='Grupos/".$row->Foto."' width=100%><br><p class='texto'>Grupo: $gr</p></div>";
            }
            mysqli_close($enlace);
        ?>
    </div>
</body>
<?php
//Se llama al footer
require_once('footer.php');
?>
