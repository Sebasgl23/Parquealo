<?php
include('./Includes/db.php');


$username = $_POST['username'];
$password = $_POST['password'];

$query = "SELECT * FROM usuarios WHERE username = '$username' ";
$validar_username=mysqli_query($conexion,$query);

if(mysqli_num_rows($validar_username) > 0){

    $querypassword = "SELECT * FROM usuarios  WHERE username = '$username' AND password='$password'";
    $validar_password=mysqli_query($conexion,$querypassword);
    
    if(mysqli_num_rows($validar_password) >0 ){

    $_SESSION['message']='El inicio de sesion fue exitoso';
    $_SESSION['message_type']='success';
    $_SESSION['username'] = $username ;
    $querynombreparqueadero = "SELECT nombreparqueadero FROM usuarios  WHERE username = '$username' AND password='$password'";
    $resultado=mysqli_query($conexion,$querynombreparqueadero);

    ?>
    <script> window.location.replace("home.php");</script>
    <?php    exit();

    }

    else{

    $_SESSION['message']='La contraseña de la cuenta es incorrecta, intentelo de nuevo';
    $_SESSION['message_type']='danger';
    ?>
    <script> window.location.replace("login.php");</script>
    <?php    exit();

    }




}

else{

    $_SESSION['message']='La cuenta no existe, registrate';
    $_SESSION['message_type']='danger';
    ?>
    <script> window.location.replace("login.php");</script>
    <?php    exit();

}







?>