<?php
//Se revisan las variables de sesion
session_start();
if(!isset($_SESSION["user"]))
{
    //Si no se han creado, la página dirige automáticamente al usuario a la página de login
    header("Location:login.php");
}
//Se llama al header y al menú
require_once('header1.php');
require_once('menu.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Estilos/estiloTabla.css">
    <title>Búsqueda</title>
</head>
<body>
    
<h1 class="titulo2">Búsqueda: </h1>

<?php
//Se conecta a la base de datos y se busca si el dato ingresado coincide con algún dato de la base de datos
$enlace = mysqli_connect("127.0.0.1", "root", "", "grupos");
$query="SELECT * FROM miembrosg WHERE Nombre_Grupo LIKE'%".$_POST["busqueda"]."%' OR Nombre_Integrante LIKE'%".$_POST["busqueda"]."%' OR Compania LIKE'%".$_POST["busqueda"]."%' OR Edad LIKE'%".$_POST["busqueda"]."%' OR Genero LIKE'%".$_POST["busqueda"]."%' OR Rol_Grupo LIKE'%".$_POST["busqueda"]."%' OR Debut LIKE'%".$_POST["busqueda"]."%'";
//Si se encontraron datos parecidos o iguales, se muestra una tabla con los resultados
if ($resultado=$enlace->query($query)) 
{
    echo "
    <table class='bonito'>

        <tr >
            <td class='col'>Nombre</td>
            <td class='col'>Grupo</td>
            <td class='col'>Compañía</td>
            <td class='col'>Edad</td>
            <td class='col'>Fecha de Nacimiento</td>
            <td class='col'>Género</td>
            <td class='col'>Lugar de nacimiento</td>
            <td class='col'>Rol en su grupo</td>
            <td class='col'>Año de debut</td>
            <td class='col'>Imagen</td>
        </tr>";

    while($row = $resultado->fetch_object())
    {
        echo "<tr>";
        echo "<td>".$row->Nombre_Integrante."</td>";
        echo "<td>".$row->Nombre_Grupo."</td>";
        echo "<td>".$row->Compania."</td>";
        echo "<td>".$row->Edad."</td>";
        echo "<td>".$row->Fecha_Nacimiento."</td>";
        echo "<td>".$row->Genero."</td>";
        echo "<td>".$row->Lugar_Nacimiento."</td>";
        echo "<td>".$row->Rol_Grupo."</td>";
        echo "<td>".$row->Debut."</td>";
        echo "<td><img src='img/".$row->Foto."' width=150 ></td>";
        echo "</tr>";
    }
    echo "</table>";
    $resultado->close();
}
mysqli_close($enlace);
?>
<br><br>
</body>
</html>


<?php
//Se llama al footer
require_once('footer.php');
?>