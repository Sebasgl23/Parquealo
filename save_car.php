<?php

include("./Includes/db.php");

$username = $_SESSION['username'];
$query = "SELECT * FROM usuarios WHERE username ='$username'";
$result_carros = mysqli_query($conexion, $query);

while ($row = mysqli_fetch_array($result_carros)) { 
    
    if($row['capacidad'] <= 0){

        $_SESSION['message']='No puedes guardar mas carros, el parqueadero ha llegado a su maxima capacidad';
        $_SESSION['message_type']='danger';
        ?>
        <script> window.location.replace("home.php");</script>
        <?php
                exit();

  }
}




if (isset($_POST['save_car'])){

    $nombre = $_POST['nombre'];
    $modelo = $_POST['modelo'];
    $placa = $_POST['placa'];
    $creador = $_SESSION['username'];

    $query = "INSERT INTO carros(nombre,modelo,placa,creador) VALUES ('$nombre','$modelo','$placa','$creador')";
    $result = mysqli_query($conexion,$query);

    $query = "UPDATE usuarios SET capacidad = capacidad - 1 WHERE username = '$username'";
    mysqli_query($conexion, $query);


    if(!$result) {
        die("Query Failed") ;
    }
    
    $_SESSION['message']='Carro guardado con exito';
    $_SESSION['message_type']='success';

    ?>
    <script> window.location.replace("home.php");</script>
    <?php
}


?>