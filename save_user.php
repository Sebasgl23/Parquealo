<?php

include("./Includes/db.php");

if (isset($_POST['save_user'])){


    $username = $_POST['username'];
    $password = $_POST['password'];
    $nombre = $_POST['nombre'];
    $documento = $_POST['documento'];
    $email = $_POST['email'];
    $nombreparqueadero = $_POST['nombreparqueadero'];
    $direccionparqueadero = $_POST['direccionparqueadero'];
    $capacidad = $_POST['capacidad'];
    $tarifa = $_POST['tarifa'];
    $horario = $_POST['horario'];
    $latitud = $_POST['latitud'];
    $longitud = $_POST['longitud'];


    //Verificamos que no se encuentre ya registrado en el sistema
    $queryverificacion = "SELECT * FROM usuarios WHERE username='$username'";
    $verificar_username = mysqli_query($conexion,$queryverificacion);

    if(mysqli_num_rows($verificar_username) > 0){

        $_SESSION['message']='La cuenta que intenta registrar ya existe';
        $_SESSION['message_type']='danger';
        ?>
        <script> window.location.replace("login.php");</script>
        <?php        exit();
    }
    //Termina la verificacion 
        
    $query = "INSERT INTO usuarios(username,password,nombre,documento,email,nombreparqueadero,direccionparqueadero,capacidad,tarifa,horario,latitud,longitud) VALUES ('$username','$password','$nombre','$documento','$email','$nombreparqueadero','$direccionparqueadero','$capacidad','$tarifa','$horario','$latitud','$longitud')";
    $result = mysqli_query($conexion,$query);

    if(!$result) {
        die("Query Failed") ;
    }

    $_SESSION['message']='Usuario creado con exito';
    $_SESSION['message_type']='success';

    ?>
    <script> window.location.replace("login.php");</script>
    <?php
}


?>