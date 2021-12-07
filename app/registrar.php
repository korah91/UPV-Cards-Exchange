<?php
    include_once 'iniciar_sesion.php';

#Incluimos la base de datos en este archivo php
include("conexion.php");
#Ya estamos conectados
if($conexion)
{
    #Si se ha pulsado el boton_registro
    if(isset($_POST["boton_registro"]))
    {
        #TODOS LOS CAMPOS DE REGISTRO SON OBLIGATORIOS menos nombre y apellidos
        #Tras las comprobaciones guardo las variables
        $dni = $_POST["dni"];
        $nick = $_POST["usuario"];
        $nombre = $_POST["nombre"];
        $apellidos = $_POST["apellidos"];
        $telefono = $_POST["telefono"];
        $email = $_POST["email"];
        $contrasena = $_POST["contrasena"];
        
        //cifro la contrasena
        $contrasena = password_hash($contrasena, PASSWORD_DEFAULT);
        
        $nacimiento = $_POST["nacimiento"];
        #Consulta
        $consulta = "INSERT INTO usuario (NICK, PASSWD, EMAIL, DNI, NOMBRE, APELLIDOS, TELEFONO, FECHANACIMIENTO) VALUES ('$nick', '$contrasena', '$email', '$dni', '$nombre', '$apellidos', '$telefono', '$nacimiento')";
        $fin = mysqli_query($conexion, $consulta);
        if($fin)
        {
            $_SESSION['usuario'] = $nick;
            if(headers_sent() === false)
            {
            header("location: index.php");
            }
        }
        else
        {
            echo "Usuario repetido";
        }
    }
}
else{
    echo "Fallo al conectar con la BD";
}
?>
