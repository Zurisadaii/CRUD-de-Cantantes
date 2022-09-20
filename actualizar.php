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
    <title>Actualizar</title>
</head>
<body>
<?php

//Función guardar actualización
function guardaActualizacion(Type $var = null)
{
    //Se conecta a la base de datos y se recibe el valor id del dato que se va a actualizar
    $enlace = mysqli_connect("127.0.0.1", "root", "", "grupos");
    $id=$_POST["id"];

    //Si no se subió un archivo, se actualizan todos los datos menos el de foto
    if($_FILES['archivo']["size"]== 0)
    {
        $query="UPDATE miembrosg SET Nombre_Integrante = '".$_POST["nombre"]."', Nombre_Grupo = '".$_POST["grupo"]."', Compania = '".$_POST["compania"]."', Edad = '".$_POST["edad"]."', Fecha_Nacimiento = '".$_POST["fech_nac"]."', Genero = '".$_POST["gen"]."', Lugar_Nacimiento = '".$_POST["lug_nac"]."', Rol_Grupo = '".$_POST["rol"]."', Debut = '".$_POST["debut"]."' WHERE ID=".$id;
    } else {//En caso de que sí se haya subio una foto, esta se borra la foto original y se crea una nueva
        if($_FILES['archivo']["type"]=='image/png')
        {
            $nombreimg=$_POST["nombre"]. '.png';
            unlink('img\\' .$nombreimg);
            $subio=move_uploaded_file ( $_FILES['archivo']['tmp_name'],'img\\' .$nombreimg);

        }
        if($_FILES['archivo']["type"]=='image/jpeg')
        {
            unlink('img\\' .$nombreimg);
            $nombreimg=$_POST["nombre"]. '.jpg';
            $subio=move_uploaded_file ( $_FILES['archivo']['tmp_name'],'img\\' .$nombreimg);
        }
        $query="UPDATE miembrosg SET Nombre_Integrante = '".$_POST["nombre"]."', Nombre_Grupo = '".$_POST["grupo"]."', Foto = '".$nombreimg."', Compania = '".$_POST["compania"]."', Edad = '".$_POST["edad"]."', Fecha_Nacimiento = '".$_POST["fech_nac"]."', Genero = '".$_POST["gen"]."', Lugar_Nacimiento = '".$_POST["lug_nac"]."', Rol_Grupo = '".$_POST["rol"]."', Debut = '".$_POST["debut"]."' WHERE ID=".$id;    
    }
    //Se redirecciona a la página que muestra los datos de la base de datos y se puede acceder a la actualización
    $enlace->query($query);
    header("Location:update.php");
    die();
}

//Al darle click al botón de submit, se llama esta función
if(isset($_POST["actualizar"]))
{
    guardaActualizacion();
}

//Se conecta a la base de datos y se recupera el valor id enviado por la página anterior, en este caso la página de update
$enlace = mysqli_connect("127.0.0.1", "root", "", "grupos");
$id=$_GET["id"];

//Se selecciona la entrada a modificar por medio de su id
$query="SELECT * FROM miembrosg WHERE ID=".$id;
$resultado=$enlace->query($query);
$row = $resultado->fetch_object();
$g = 0;
//Se revisa el género guardado para poder tener asignado el valor automáticamente, esto para evitar que se guarde un dato sin éste valor
if($row->Genero == 'Masculino') {
    $g = 1;
}
//Si el valor g es igual a uno, es un hombre y se agrega la cadena checked='checked' al botón radio que dice masculino, si g es igual a 0, esto se hace con el botón de femenino
$ch = $g === 1 ? "checked='checked'" : '';
$ch2 = $g === 0 ? "checked='checked'" : '';
echo "<h1 class='titulo2'>Actualizar datos</h1>";
//Se muestran las áreas que se pueden editar, solo el id es escondido
echo "<div class='datos'>
<form action='actualizar.php' method='POST' enctype='multipart/form-data' >
    <input type='hidden' name='id' value='".$row->ID."'>
    <label for='nombre' class='add1'>Nombre</label>
    <label for='grupo'  class='add2-1'>Grupo</label><br>
    <input type='text' class='texto' name='nombre' value='".$row->Nombre_Integrante."'>
    <input type='text' class='texto1' name='grupo' value='".$row->Nombre_Grupo."'> <br><br>
    <label for='archivo'  class='add1'>Foto</label>
    <label for='compania'  class='add2-2'>Compañía</label><br>
    <input type='file' class='foto' name='archivo' value='".$row->Foto."'>
    <input type='text' class='texto2' name='compania' value='".$row->Compania."'><br> <br>
    <label for='edad'  class='add1'>Edad</label>
    <label for='fech_nac'  class='add2-3'>Fecha de Nacimiento</label><br>
    <input type='number' class='texto3' name='edad' value='".$row->Edad."'> 
    <input type='date' name='fech_nac' class='fecha' value='".$row->Fecha_Nacimiento."'><br><br>
    <label for='gen'  class='add1'>Género</label>
    <label for='lug_nac'  class='add2-4'>Lugar de nacimiento</label><br>
    <input type='radio' class='g' name='gen' placeholder='Genero' $ch value=".$row->Genero."> Masculino
    <input type='radio' class='g' name='gen' placeholder='Genero' $ch2 value=".$row->Genero."> Femenino
    <input type='text' class='texto4' name='lug_nac' value='".$row->Lugar_Nacimiento."'><br> <br>
    <label for='rol'  class='add1'>Rol en el grupo</label>
    <label for='debut'  class='add2-5'>Año de debut</label><br>
    <input type='text' class='texto' name='rol' value='".$row->Rol_Grupo."'> 
    <input type='number' class='texto5' name='debut' class='num' value='".$row->Debut."'><br><br>
    <input type='submit' name='actualizar'>
</form>
</div>";
?>
</body>
</html>


<?php
//Se llama al footer
require_once('footer.php');
?>