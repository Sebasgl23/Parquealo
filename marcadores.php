<?php

 
 include("./Includes/db.php");
 
  // Listamos las direcciones con todos sus datos (lat, lng, dirección, etc.)
$query="SELECT * FROM usuarios";
$result = mysqli_query($conexion, $query);
 
  // Seleccionamos los datos para crear los marcadores en el Mapa de Google serian direccion, lat y lng 
     while ($row = mysqli_fetch_array($result)) {
      echo '["' . $row['nombreparqueadero'] . '", "' . $row['direccionparqueadero'] . ' ", ' . $row['capacidad'] . ', ' . $row['latitud'] . ', ' . $row['longitud'] . '],';
  }







?>

