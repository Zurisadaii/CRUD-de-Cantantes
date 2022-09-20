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
    <link rel="stylesheet" href="Estilos/estiloAdd.css">
    <title>Añadir</title>
</head>
<body>
<?php
    //Se guarda la variable grupo ya que esta ya es decidida cuando el usuario da click en el grupo al que quiere agregar un miembro
    $gr = $_GET['grupo'];
    function Inserta()
    {
        //Se realiza la conexión con la base de datos
        $enlace = mysqli_connect("127.0.0.1", "root", "", "grupos");
        global $gr;
        //Se reciben los datos introducidos por el cliente
        $nombre=$_POST["nombre"];
        $grupo=$gr;
        $compania=$_POST["compania"];
        $edad=$_POST["edad"];
        $fech_nac=$_POST["fech_nac"];
        $gen=$_POST["gen"];
        $lug_nac=$_POST["lug_nac"];
        $rol=$_POST["rol"];
        $debut=$_POST["debut"];

        //Se revisa si el integrante que se quiere agregar ya exite. Se recuperan el nombre y grupo de cada uno de la base de datos
        $match = 0; $i = 0;
        $lista = array();
        $lista2 = array();
        if ($resultado = $enlace->query("SELECT Nombre_Grupo, Nombre_Integrante FROM miembrosg")) {
            while($row = $resultado->fetch_object())
            {
                $lista[] = $row->Nombre_Grupo;
                $lista2[] = $row->Nombre_Integrante;
            }
            $resultado->close();
        }

        //Se comparan con el dato grupo y nombre introducidos
        foreach ($lista as $lis) {
            if($lista[$i] == $grupo && $lista2[$i] == $nombre) {
                $match++;
            }
            $i++;
        }

        //Si el valor de match es mayor a 0, esto quiere decir que hubo una coincidencia y se va a mostrar un mensaje de error
        if($match > 0){
            echo"<script language='javascript'> alert('Datos repetidos'); </script>";
        } else{ //En caso de que no haya coincidencias, se agrega la imagen del integrante a la carpeta de imágenes
            if($_FILES['archivo']["type"]=='image/png')
            {
                $nombreimg=$_POST["nombre"].$grupo. '.png';
                $subio=move_uploaded_file ( $_FILES['archivo']['tmp_name'],'img\\' .$nombreimg);

            }
            if($_FILES['archivo']["type"]=='image/jpeg')
            {
                $nombreimg=$_POST["nombre"].$grupo. '.jpg';
                $subio=move_uploaded_file ( $_FILES['archivo']['tmp_name'],'img\\' .$nombreimg);
            }

            //Se agregan los daos a la tabla asignada
            $query="INSERT INTO miembrosg (Nombre_Integrante, Nombre_Grupo, Foto, Compania, Edad, Fecha_Nacimiento, Genero, Lugar_Nacimiento, Rol_Grupo, Debut) VALUES('".$nombre."', '".$grupo."','".$nombreimg."','".$compania."', '".$edad."','".$fech_nac."','".$gen."','".$lug_nac."', '".$rol."','".$debut."')";
            //Se cierra la conexión con la base de datos y se redirige a la pagina de muestra de los grupos
            $enlace->query($query);
            var_dump($query);
            mysqli_close($enlace);
            header("Location:grupos.php");
            die(); 
        }
    }

    //Si ya se asignó el nombre de la persona, se llama a la función de insertar
    if(isset($_POST["nombre"]))
    {
        Inserta();        
    }
    

    echo "<h1 class='titulo'>Añadir</h1>";

    //Se muestran los datos a ingresar. Se usa el nombre del grupo como id para añadir el integrante al grupo seleccionado
    echo " <div class='datos'>
        <form action='add.php?grupo=".$gr."' method='POST' enctype='multipart/form-data' >
            <label for='nombre' class='add1'>Nombre</label>
            <label for='grupo'  class='add2-1'>Grupo</label><br>
            <input type='text' class='texto' name='nombre'>";
            //El área de grupo se deshabilita para que no se vayan a agregar miembros a un grupo que no existe dentro de la base de datos
            if($gr) {
                echo " <input type='text' class='texto1' name='grupo' value='".$gr."' disabled> <br><br>";}
                else {
                    echo " <input type='text' class='texto1' name='grupo'> <br><br>";
                }
            echo "<label for='archivo'  class='add1'>Foto</label>
            <label for='compania'  class='add2-2'>Compañía</label><br>
            <input type='file' class='foto' name='archivo'>
            <input type='text' class='texto2' name='compania'><br> <br>
            <label for='edad'  class='add1'>Edad</label>
            <label for='fech_nac'  class='add2-3'>Fecha de Nacimiento</label><br>
            <input type='number' class='texto3' name='edad'> 
            <input type='date' name='fech_nac' class='fecha'><br><br>
            <label for='gen'  class='add1'>Género</label>
            <label for='lug_nac'  class='add2-4'>Lugar de nacimiento</label><br>
            <input type='radio' class='g' name='gen' placeholder='Genero' value='Masculino'> Masculino
            <input type='radio' class='g' name='gen' placeholder='Genero' value='Femenino'> Femenino
            <input type='text' class='texto4' name='lug_nac'><br> <br>
            <label for='rol'  class='add1'>Rol en el grupo</label>
            <label for='debut'  class='add2-5'>Año de debut</label><br>
            <input type='text' class='texto' name='rol'> 
            <input type='number' class='texto5' name='debut' class='num'><br><br>
            <input type='submit'>
        </form>
    </div>";
?>
</body>

</html>


<?php
//Se llama al footer
require_once('footer.php');
?>