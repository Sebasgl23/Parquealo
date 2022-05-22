<?php include("./Includes/db.php") ?>

<?php include("./Includes/header.php") ?>


<?php

if (isset($_SESSION['username'])) { 

$_SESSION['message'] = 'Ya tienes una sesion iniciada en el sistema';
$_SESSION['message_type'] = 'danger' ;
?>
<script> window.location.replace("home.php");</script>
<?php
die();

} ?>


<body style="background-color:lightblue;">
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <a class="navbar-brand" href="index.php">
            <img src="Images/logo.png" width="150" height="102" class="d-inline-block align-middle" alt="">
            Parquealo
        </a> <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <a class="nav-item nav-link " href="index.php">Inicio <span class="sr-only"></span></a>
            </div>
            <div class="ml-auto navbar-nav ">
                <a class="nav-item nav-link active ">Iniciar Sesion <span class="sr-only"></span></a>
            </div>
            
        </div>
    </nav>

    <br>

    <?php

if (isset($_SESSION['message'])) { ?>

  <div class="alert alert-<?= $_SESSION['message_type'] ?> alert-dismissible fade show w-50 mx-auto" role="alert">
    <?= $_SESSION['message'] ?>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>

<?php  unset($_SESSION['message']); unset($_SESSION['message_type']);
} ?>

    <div class="form-container mt-5">
        <form action="validacion.php" class="w-50 mx-auto" method="POST">
            <div class="form-group">
                <label for="owner">Nombre de Usuario:</label>
                <input type="text" name="username" class="form-control rounded-0 shadow-sm" id="username" required>

            </div>
            <div class="form-group">
                <label for="car">Contraseña:</label>
                <input type="password" name="password" class="form-control rounded-0 shadow-sm" id="password" required>

            </div>
            <button type="submit" class="btn mx-auto d-block mt-5 rounded-1 shadow" id="btnOne" name="login" value="LogIn">Iniciar Sesion</button>

        </form>
    </div>

    <div class="form-container mt-5 text-center">
        <p>No estas registrado?  <a href="register.php"> Registrate</a></p>
    </div>







    <?php include("./Includes/footer.php") ?>