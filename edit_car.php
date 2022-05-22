<?php

include("./Includes/db.php");

if (isset($_SESSION['username']) == FALSE) {
    $_SESSION['message'] = 'No ha iniciado sesion, inicie sesion para continuar';
    $_SESSION['message_type'] = 'danger';
    ?>
    <script> window.location.replace("login.php");</script>
    <?php    die();
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "SELECT * FROM carros WHERE id = $id";
    $result = mysqli_query($conexion, $query);

    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_array($result);
        $nombre = $row['nombre'];
        $modelo = $row['modelo'];
        $placa = $row['placa'];
    }
}

if (isset($_POST['edit_car'])) {

    $id = $_GET['id'];
    $nombre = $_POST['nombre'];
    $modelo = $_POST['modelo'];
    $placa = $_POST['placa'];

    $query = "UPDATE carros set nombre = '$nombre', modelo = '$modelo', placa = '$placa' WHERE ID = $id";
    mysqli_query($conexion, $query);

    $_SESSION['message'] = 'Carro actualizado con exito';
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
        <a class="nav-item nav-link active " href="home.php">Control de Parqueadero<span class="sr-only"></span></a>
      </div>
      <div class="navbar-nav">
        <a class="nav-item nav-link " href="edit_user.php">Modificar Datos<span class="sr-only"></span></a>
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
        <form action="edit_car.php?id=<?php echo $_GET['id'] ?>" class="w-50 mx-auto" method="POST">
            <div class="form-group">
                <label for="owner">Dueño del Carro:</label>
                <input type="text" name="nombre" class="form-control rounded-0 shadow-sm" id="nombre" value="<?php echo $nombre  ?>" placeholder="Actualizar nombre" required>
                <small id="emailHelp" class="form-text text-muted">Nombre de la persona a cargo del carro.</small>

            </div>
            <div class="form-group">
                <label for="car">Modelo del Carro:</label>
                <input type="text" name="modelo" class="form-control rounded-0 shadow-sm" id="modelo" value="<?php echo $modelo  ?>" placeholder="Actualizar modelo" required>
                <small id="emailHelp" class="form-text text-muted">Marca y referencia del carro.</small>

            </div>
            <div class="form-group">
                <label for="licensePlate">Placa del carro:</label>
                <input type="text" name="placa" class="form-control rounded-0 shadow-sm" id="placa" value="<?php echo $placa  ?>" placeholder="Actualizar placa" required>
                <small id="emailHelp" class="form-text text-muted">Placa del carro solo en formato placa.</small>

            </div>
            <button type="submit" class="btn mx-auto d-block mt-5 rounded-1 shadow" id="btnOne" name="edit_car" value="Edit Car">Editar Carro</button>

        </form>
    </div>




    <?php include("./Includes/footer.php") ?>