<?php

    include("./Includes/db.php");

    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $query = "DELETE FROM carros WHERE ID = $id";
        $result = mysqli_query($conexion,$query);
        
        if(!$result) {
            die("Query Failed") ;
        }
        
        $username = $_SESSION['username'];
        $query = "UPDATE usuarios SET capacidad = capacidad + 1 WHERE username = '$username'";
        mysqli_query($conexion, $query);

        $_SESSION['message']='Carro eliminado con exito';
        $_SESSION['message_type']='danger';
        ?>
        <script> window.location.replace("home.php");</script>
        <?php
    }


?>



