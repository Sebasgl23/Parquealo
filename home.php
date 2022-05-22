<?php include("./Includes/db.php") ?>

<?php include("./Includes/header.php") ?>


<?php



if (isset($_SESSION['username']) == FALSE) {

  $_SESSION['message'] = 'No ha iniciado sesion, inicie sesion para continuar';
  $_SESSION['message_type'] = 'danger';
  ?>
  <script> window.location.replace("login.php");</script>
  <?php  die();
} ?>

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
        <a class="nav-item nav-link active ">Control de Parqueadero<span class="sr-only"></span></a>
      </div>
      <div class="ml-auto navbar-nav nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-expanded="false">
          Sesion iniciada como <?php echo $_SESSION['username']; ?>
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="edit_user.php?username=<?php echo $_SESSION['username']; ?>">Modificar datos</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="logout.php">Cerrar Sesion</a>
        </div>
      </div>
    </div>
  </nav>

  <br><br>

  <?php

$username = $_SESSION['username'];
$query = "SELECT * FROM usuarios WHERE username ='$username'";
$result_carros = mysqli_query($conexion, $query);


while ($row = mysqli_fetch_array($result_carros)) {?>


              <?php
              if($row['capacidad']>0)
              {
              ?>

              <h1 class="text-center">Cupos restantes: <?php echo $row['capacidad']; ?> carros</td>

              <?php
              }
              if($row['capacidad']<=0)
              {
              ?>

              <h1 class="text-center">No tienes cupos restantes </td>


          <?php  }}
          ?>



  <br><br>
  <h2 class="text-center">Ingresar Carro</h1>
    <br><br>
    <?php

    if (isset($_SESSION['message'])) { ?>

      <div class="alert alert-<?= $_SESSION['message_type'] ?> alert-dismissible fade show w-50 mx-auto" role="alert">
        <?= $_SESSION['message'] ?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

    <?php unset($_SESSION['message']);
      unset($_SESSION['message_type']);
    } ?>


    <div class="form-container mt-5">
      <form action="save_car.php" class="w-50 mx-auto" method="POST">
        <div class="form-group">
          <label for="owner">Dueño del Carro:</label>
          <input type="text" name="nombre" class="form-control rounded-0 shadow-sm" id="nombre" required>
          <small id="emailHelp" class="form-text text-muted">Nombre de la persona a cargo del carro.</small>

        </div>
        <div class="form-group">
          <label for="car">Modelo del Carro:</label>
          <input type="text" name="modelo" class="form-control rounded-0 shadow-sm" id="modelo" required>
          <small id="emailHelp" class="form-text text-muted">Marca y referencia del carro.</small>

        </div>
        <div class="form-group">
          <label for="licensePlate">Placa del carro:</label>
          <input type="text" name="placa" class="form-control rounded-0 shadow-sm" id="placa" required>
          <small id="emailHelp" class="form-text text-muted">Placa del carro solo en formato placa.</small>

        </div>
        <button type="submit" class="btn mx-auto d-block mt-5 rounded-1 shadow" id="btnOne" name="save_car" value="Save Car">Agregar Carro</button>

      </form>
    </div>
    <div class="table-container table-responsive mt-5 mb-5 w-75 mx-auto">
      <h5 class="text-center mb-3">Carros dentro del parqueadero</h5>
      <table id="parkingTable" class="table table-striped shadow ">
        <thead class="text-white text-center" id="tableHead">
          <tr>
            <th class="text-center">Dueño</th>
            <th class="text-center">Modelo</th>
            <th class="text-center">Placa</th>
            <th class="text-center">Fecha de Entrada</th>
            <th class="text-center">Acciones</th>
          </tr>
        </thead>
        <tbody id="tableBody">
          <?php
          $username = $_SESSION['username'];
          $query = "SELECT * FROM carros WHERE creador ='$username'";
          $result_carros = mysqli_query($conexion, $query);

          while ($row = mysqli_fetch_array($result_carros)) { ?>

            <tr>
              <td class="text-center"><?php echo $row['nombre']; ?></td>
              <td class="text-center"><?php echo $row['modelo']; ?></td>
              <td class="text-center"><?php echo $row['placa']; ?></td>
              <td class="text-center"><?php echo $row['entrada']; ?></td>
              <td class="text-center">
                <a id="botonEditar" class="btn btn-secondary" href="edit_car.php?id=<?php echo $row['id'] ?>">
                  <i class="fas fa-marker"></i> </a>
                <a class="btn btn-danger" href="delete_car.php?id=<?php echo $row['id'] ?>">
                  <i class="far fa-trash-alt"></i>
                </a>
              </td>
            </tr>


          <?php  }
          ?>

        </tbody>
      </table>

    </div>

    <?php include("./Includes/footer.php") ?>