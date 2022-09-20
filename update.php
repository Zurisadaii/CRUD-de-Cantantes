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
    <title>Actualizar</title>

    <?php
    function Eliminar()
    {
        //Se conecta a la base de datos y se selecciona un miembro dentro de la base de datos t se elimina un dato con el uso de sistema
        $enlace = mysqli_connect("127.0.0.1", "root", "", "grupos");
        $id=$_POST["id"];

        $query="DELETE FROM miembrosg WHERE ID=".$id;
        $enlace->query($query);
    }
    //Se manda a borrar el dato una vez que se da click en el botón de enviar durante la lision==
    if(isset($_POST["Elimina"]))
    {
        Eliminar();
    }
?>


</head>
<body>
    
<h1 class="act">Actualizar</h1>

<br>

<!--Se conecta a la base de datos y se se selecciona toda la información para ser mostrada por medio de una tabla-->
<?php
$enlace = mysqli_connect("127.0.0.1", "root", "", "grupos");
if ($resultado = $enlace->query("SELECT * FROM miembrosg")) 
{
    $aux=0;
    $total=0;
    echo "
    <table class='bonito'>

        <tr>
            <td class='titulo'>Nombre</td>
            <td class='titulo'>Grupo</td>
            <td class='titulo'>Compañía</td>
            <td class='titulo'>Edad</td>
            <td class='titulo'>Fecha de Nacimiento</td>
            <td class='titulo'>Género</td>
            <td class='titulo'>Lugar de nacimiento</td>
            <td class='titulo'>Rol en su grupo</td>
            <td class='titulo'>Año de debut</td>
            <td class='titulo'>Imagen</td>
            <td class='titulo'>Opciones</td>
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
        //Se agregan dos botones, uno para actualizar datos y otro para eliminar un dato de la base de datos
        echo "<td>
                <form action='update.php' method='POST' >
                    <input type='hidden' name='id' value='".$row->ID."'>
                    <input type='submit' value='Elimina' name='Elimina'>
                </form>
                <br>
                <form action='actualizar.php?id=".$row->ID."' method='POST' >
                    <input type='hidden' name='id' value='".$row->ID."'>
                    <input type='submit' value='Actualizar' name='Actualizar'>
                </form>
        </td>";
    }
    echo "</table>";
    $resultado->close();
}
mysqli_close($enlace);
?>
</body>
</html>


<?php
//Se llama al footer
require_once('footer.php');
?>
