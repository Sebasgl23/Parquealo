<?php include("./Includes/db.php") ?>

<?php include("./Includes/header.php") ?>



<body style="background-color:lightblue;">

            

<?php

if (isset($_SESSION['username']) == TRUE) { ?>

<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <a class="navbar-brand" href="index.php">
      <img src="Images/logo.png" width="150" height="102" class="d-inline-block align-middle" alt="">

    </a> <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav">
        <a class="nav-item nav-link active">Inicio <span class="sr-only"></span></a>
      </div>
      <div class="navbar-nav">
        <a class="nav-item nav-link" href="home.php">Control de Parqueadero<span class="sr-only"></span></a>
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

<?php 

} ?>


<?php

if (isset($_SESSION['username']) == FALSE) { ?>

<nav class="navbar navbar-expand-lg navbar-dark bg-primary" ">
        <a class="navbar-brand" href="index.php">
            <img src="Images/logo.png" width="150" height="102" class="d-inline-block align-middle" alt="">
            
        </a> <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <a class="nav-item nav-link active" >Inicio <span class="sr-only"></span></a>
            </div>
            <div class="ml-auto navbar-nav ">
                <a class="nav-item nav-link " href="login.php">Iniciar Sesion <span class="sr-only"></span></a>
            </div>
            
        </div>
    </nav>

    

<?php 

} ?>

<div id="map"></div>

<script>
    var map = new GMaps({
      el: '#map',
      lat: 10.407288,
      lng: -75.507496,
      zoom: 16
    });

    GMaps.geolocate({
        success: function(position){
          lat = position.coords.latitude;  
          lng = position.coords.longitude;
          //Definimos la vista del mapa sobre las coordenadas obtenidas
          map.setCenter(lat, lng);
          //Añadimos un marcador
          map.addMarker({ lat: lat , lng: lng,   label: {text: "Tu Ubicacion",fontSize: "15px", }, infoWindow:{ content: '<h3 class="text-center">Esta es tu ubicacion</h3>' } });  

        },
        error: function(error){
          alert('Geolocation failed: '+error.message);
        },
        not_supported: function(){
          alert("Your browser does not support geolocation");
        }
      });




      

    
  </script>

<?php $result = mysqli_query($conexion, "SELECT * FROM usuarios"); 

  // Creamos una tabla para listar los datos 

  while ($row = mysqli_fetch_array($result)) {

    ?>
<a href=""></a>
    <script>

    map.addMarker({ lat: <?php echo $row['latitud'] ?> , 
                    lng: <?php echo $row['longitud'] ?> , 
                    infoWindow:{ content: 
                    '<h3 class="text-center"><?php echo $row['nombreparqueadero']; ?> </h3>' + 
                    '<p class="text-center">Direccion: <?php echo $row['direccionparqueadero']; ?></p>' + 
                    '<p class="text-center"><?php if($row['capacidad']>0){echo "Cupos disponibles: " , $row['capacidad'];} else {echo "Este parqueadero no tiene cupos actualmente";} ?></p>' + 
                    '<p class="text-center">Valor de la hora: <?php echo $row['tarifa']; ?>$ pesos</p>' + 
                    '<p class="text-center">El horario es: <?php echo $row['horario']; ?></p>' +
                    '<p class="text-center"> <a class="btn " id="btnOne" href="http://www.google.com/maps/place/<?php echo $row['latitud']; ?>,<?php echo $row['longitud']; ?>">Ir a la ubicacion</a></p>' }});  


    </script>

    <?php
  }

?>  

    <?php include("./Includes/footer.php") ?>