<?php

include("./Includes/db.php");

if (isset($_SESSION['username']) == TRUE) {
    $username = $_SESSION['username'];
    $query = "SELECT * FROM usuarios WHERE username = '$username'";
    $result = mysqli_query($conexion, $query);

    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_array($result);
        $nombreparqueadero = $row['nombreparqueadero'];
        $capacidad = $row['capacidad'];
        $tarifa = $row['tarifa'];
        $horario = $row['horario'];

    }
}

if (isset($_SESSION['username']) == FALSE) {
    $_SESSION['message'] = 'No ha iniciado sesion, inicie sesion para continuar';
    $_SESSION['message_type'] = 'danger';
    ?>
    <script> window.location.replace("login.php");</script>
    <?php    die();
}



if (isset($_POST['edit_user'])) {

    $username = $_SESSION['username'];
    $nombreparqueadero = $_POST['nombreparqueadero'];
    $capacidad = $_POST['capacidad'];
    $tarifa = $_POST['tarifa'];
    $horario = $_POST['horario'];
    $query = "UPDATE usuarios set nombreparqueadero = '$nombreparqueadero', capacidad = '$capacidad', tarifa = '$tarifa', horario = '$horario' WHERE username = '$username'";
    mysqli_query($conexion, $query);

    $_SESSION['message'] = 'Informacion del parqueadero actualizada con exito';
    $_SESSION['message_type'] = 'info';
    ?>
    <script> window.location.replace("home.php");</script>
    <?php
    }

?>

<?php include("./Includes/header.php") ?>

<body style="background-color:lightblue;">
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <a class="navbar-brand" href="index.php">
      <img src="Images/logo.png" width="150" height="102" class="d-inline-block align-middle" alt="">
    </a> <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav">
        <a class="nav-item nav-link " href="index.php">Inicio <span class="sr-only"></span></a>
      </div>
      <div class="navbar-nav">
        <a class="nav-item nav-link active" href="home.php">Control de Parqueadero<span class="sr-only"></span></a>
      </div>
      <div class="ml-auto navbar-nav nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-expanded="false">
          Sesion iniciada como <?php echo $_SESSION['username']; ?>
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="edit_user.php">Modificar datos</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="logout.php">Cerrar Sesion</a>
        </div>
      </div>
    </div>
  </nav>


    <div class="form-container mt-5">
    <form action="edit_user.php?username=<?php echo $_SESSION['username'] ?>" class="w-50 mx-auto" method="POST">
            <br>
            <h3 class="text-center"> Informacion del parqueadero</h1>
            <br>

            <div class="form-group">
                <label for="owner">Nombre del parqueadero:</label>
                <input type="text" name="nombreparqueadero" value="<?php echo $nombreparqueadero ?>" class="form-control rounded-0 shadow-sm" id="nombreparqueadero" required>

            </div>

            <div class="row">
                <div class="col-6">
                    <label for="capacidad">Capacidad:</label>
                    <input type="number" name="capacidad" value="<?php echo $capacidad  ?>" class="form-control rounded-0 shadow-sm" id="capacidad" required>
                </div>
                <div class="col-6">
                    <label for="tarifa">Tarifa por hora:</label>
                    <input type="number" name="tarifa" value="<?php echo $tarifa  ?>" class="form-control rounded-0 shadow-sm" id="tarifa" required>
                </div>
            </div>
            <br>

            <div class="form-group">
                <label for="owner">Horario:</label>
                <input type="text" name="horario" value="<?php echo $horario  ?>" class="form-control rounded-0 shadow-sm" id="horario" required>

            </div>
            

            <button type="submit" class="btn mx-auto d-block mt-5 rounded-1 shadow" id="btnOne" name="edit_user" value="Edit User">Registrarse</button>

        </form>



    <?php include("./Includes/footer.php") ?>