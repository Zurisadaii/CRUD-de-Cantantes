<?php
//Se inicia la sesión
session_start();
//Si se recibe la variable band es que el usuario a penas se está registrando
if(isset($_POST["band"]) && $_POST["band"]==1)
{
    //Se conecta a la base de datos y se encripta la contraseña para almacenarla como una cadena encriptada
    $enlace = mysqli_connect("127.0.0.1", "root", "", "grupos");
    $contraseña=hash('md5', $_POST["password"]);
    //Se guardan el usuario y la contraseña encriptada dentro de la base de datos para que puedan hacer login
    $query="INSERT INTO usuarios (usuario, password) VALUES('".$_POST["usuario"]."', '".$contraseña."')";
    $enlace->query($query);
    mysqli_close($enlace); 
    //Se inicia sesión automáticamente y se redirige a la página principal
    $_SESSION["user"]=$_POST["usuario"];

    header("Location:pInicial.php");

}
//Si se recibe el usuario y contraseña solamente
if(isset($_POST["usuario"]) && isset($_POST["password"]))
{
    //Se conecta a la base de datos y se encripta la clave ingresada para compararla con la almacenada para asegurarse de que es correcta
    $enlace = mysqli_connect("127.0.0.1", "root", "", "grupos");
    $contraseña=hash('md5', $_POST["password"]);
    $usuario = $_POST["usuario"];

    //Se comparan el usuario y contraseña enciptada para asegurarse de que ya está registrada la cuenta
    $query="SELECT * FROM usuarios WHERE usuario='".$usuario."' AND password='".$contraseña."'";
    var_dump($query);
    $resultado=$enlace->query($query);
    var_dump($resultado);
    $row = $resultado->fetch_object();

    //Si se encuentra la cuenta en la base de datos, el usuario puede ingresar a la plataforma
    var_dump($row);
    if(isset($row->usuario))
    {
        $_SESSION["user"]=$_POST["usuario"];
        header("Location:pInicial.php");                    
    }
    else //Si no se encuentra la cuenta en la base de datos, se redirecciona a la pagina de login
    {
        unset($_SESSION["user"]);
        header("Location:login.php");
    }
}

?>