<?php 

include("./Includes/db.php") ;

    session_destroy();
    ?>
    <script> window.location.replace("home.php");</script>
    <?php   
    session_start();

    $_SESSION['message'] = 'Sesion cerrada con exito';
    $_SESSION['message_type'] = 'success';

    




?>