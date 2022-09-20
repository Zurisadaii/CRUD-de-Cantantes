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
    <link rel="stylesheet" href="Estilos/estiloAddG.css">
    <title>Añadir Grupo</title>
</head>
<body>
<?php
    //La función inserta que se encarga de guardar un nuevo grupo en la base de datos
    function Inserta()
    {
        //Se conecta a la base de datos y se reciben los valores de nombre de grupo y número de integrantes
        $enlace = mysqli_connect("127.0.0.1", "root", "", "grupos");
        $grupo=$_POST["grupo"];
        $miembros=$_POST["miembros"];

        $match = 0; $i = 0;
        $lista = array();
        //Se reciben todos los nombres de los grupos ya existentes y se guardan en un arreglo
        if ($resultado = $enlace->query("SELECT Nombre FROM tgrupos")) {
            while($row = $resultado->fetch_object())
            {
                $lista[] = $row->Nombre;
            }
            $resultado->close();
        }
        //Cada que se encuentre un grupo en la base de datos con el mismo nombre del grupo nuevo, se le agrega uno a la variable match
        foreach ($lista as $lis) {
            if($lista[$i] == $grupo) {
                $match++;
            }
            $i++;
        }

        //Si match tiene un valor más grande que 0, esto quiere decir que el grupo ya existe en la base de datos y se muestra un letrero que le avisa al usuario
        if($match > 0){
            echo"<script language='javascript'> alert('Datos repetidos'); </script>";
        } else{ //Si no se encuentra un grupo con el mismo nombre, se almacena la foto del grupo dentro de la carpeta de grupos
            if($_FILES['archivo']["type"]=='image/png')
            {
                $nombreimg=$_POST["grupo"]. '.png';
                $subio=move_uploaded_file ( $_FILES['archivo']['tmp_name'],'Grupos\\' .$nombreimg);

            }
            if($_FILES['archivo']["type"]=='image/jpeg')
            {
                $nombreimg=$_POST["grupo"]. '.jpg';
                $subio=move_uploaded_file ( $_FILES['archivo']['tmp_name'],'Grupos\\' .$nombreimg);
            }

            //Se agrega el nuevo grupo a la base de datos, se cierra la conexión con la base de datos y se redirige a la página de muestra de grupos
            $query="INSERT INTO tgrupos (Nombre, Foto, N_Miembros) VALUES('".$grupo."', '".$nombreimg."','".$miembros."')";
            
            $enlace->query($query);
            mysqli_close($enlace);
            header("Location:grupos.php");
            die();
        }
    }

    //Si la variable grupo tiene un valor, se llama a la función de insertar
    if(isset($_POST["grupo"]))
    {
        Inserta();        
    }
    
    echo "<h1 class='titulo'>Añadir Grupo</h1>";

    //Se muestra el formulario para agregar un nuevo grupo
    echo " <div class='datos'>
        <form action='addGrupo.php' method='POST' enctype='multipart/form-data' >
            <label for='grupo'  class='add1'>Grupo</label><br>
            <input type='text' class='texto' name='grupo'> <br><br><br>
            <label for='archivo'  class='add1'>Foto</label> <br>
            <input type='file' class='foto' name='archivo'> <br><br><br>
            <label for='miembros'  class='add1'>Miembros</label> <br>
            <input type='number' class='texto' name='miembros'> <br><br><br>
            <input type='submit'>
        </form>
    </div>";
?>
</body>

</html>


<?php
//Se llama al header
require_once('footer.php');
?>