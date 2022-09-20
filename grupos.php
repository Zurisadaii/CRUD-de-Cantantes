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
    <link rel="stylesheet" href="Estilos/estiloGrupos.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <title>Grupos</title>
</head>
<body>
    <h1 class="titulo">Grupos</h1>
    <div class="container">
        <?php
            //Se crea el enlace con la base de datos y se crean dos arreglos para 
            $enlace = mysqli_connect("127.0.0.1", "root", "", "grupos");
            $lista = array();
            $lista2 = array();
            
            //Se selecciona y se guarda toda la informacion dentro de la base de datos de grupos
            if ($resultado = $enlace->query("SELECT * FROM tgrupos")) 
            {
                while($row = $resultado->fetch_object())
                {
                    $lista[] = $row->Nombre;
                }
                $resultado->close();
            }

            //Se selecciona y se guardan los nombres de grupos de la base de datos de integrantes
            if ($resultado = $enlace->query("SELECT * FROM miembrosg")) 
            {
                while($row = $resultado->fetch_object())
                {
                    $lista2[] = $row->Nombre_Grupo;
                }
                $resultado->close();
            }

            //Se saca la cuenta de las veces que se repite un nombre para poder mostrarlo
            $grupos = $lista;
            $miembros = array_count_values($lista2);

            //Por cada grupo guardado en la base de datps
            foreach($grupos as $gr){
                $resultado = $enlace->query("SELECT * FROM tgrupos WHERE Nombre ='$gr'");
                $row = $resultado->fetch_object();
                //Se muestra el nombre y el número de miembros en el grupo
                echo "<div class='cuadro'><img class='foto' src='Grupos/".$row->Foto."' width=100%>
                    <p class='texto'>Grupo: $gr <br> Miembros: $row->N_Miembros ";
                    //Se revisa si cada nombre de grupo aparece en la base de datos. Si no aparece, se pone que los miembros en el sistema son 0
                    //Se usó la función array_key_exists(), si la función devuelve verdadero es que sí existe
                    if (array_key_exists($gr, $miembros)) {
                        echo"<br> Miembros en el sistema: $miembros[$gr]</p>
                        <td>";
                    } else {
                        echo"<br> Miembros en el sistema: 0</p>";
                    }

                    //Si se tienen guardados miembros del grupo en el sistema y son en total en número de integrantes dentro del grupo, se bloquea el botón de agregar miembros
                    if(array_key_exists($gr, $miembros) && $row->N_Miembros == $miembros[$gr]){
                        echo "<form class='bot1' action='add.php?grupo=".$gr."' method='POST' >
                            <input type='hidden' name='grupo' value='".$gr."'>
                            <input type='submit' value='Agregar miembro' disabled='disabled' name='Add'>
                        </form>";
                        //Si no se tienen guardados miembros del grupo dentro de la base de datos, el botón de agregar miembro está activado
                    } else if (!array_key_exists($gr, $miembros)) {
                        echo "<form class='bot1' action='add.php?grupo=".$gr."' method='POST' >
                            <input type='hidden' name='grupo' value='".$gr."'>
                            <input type='submit' value='Agregar miembro' name='Add'>
                        </form>";
                    } else { 
                        echo "<form class='bot1' action='add.php?grupo=".$gr."' method='POST' >
                            <input type='hidden' name='grupo' value='".$gr."'>
                            <input type='submit' value='Agregar miembro' name='Add'>
                        </form>";
                    }
                    echo "</td>
                </div>";
            } ?>
            <!--Se muestra un cuadro extra que al darle click permitirá al usuario agregar grupos al sistema -->
            <div class='cuadro2' onclick="location.href='addGrupo.php'"><i class='material-icons' id='mas'>add_circle_outline</i><br><br><br><br><br>
                    <p class='texto'>Agregar nuevo grupo</p><br>
                    <td>
                </div>
            <?php mysqli_close($enlace);
        ?>
        
    </div>
</body>
<?php
    //Se llama al footer
    require_once('footer.php');
?>
