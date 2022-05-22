<?php include("./Includes/db.php") ?>

<?php include("./Includes/header.php") ?>

<?php

if (isset($_SESSION['username'])) { 

$_SESSION['message'] = 'Ya tienes una sesion iniciada en el sistema, no puedes hacer esto';
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
                <a class="nav-item nav-link " href="login.php" >Iniciar Sesion <span class="sr-only"></span></a>
            </div>
            
        </div>
    </nav>

    <div class="map"></div>

    <br><br>
    <h1 class="text-center">Registro de Usuario</h1>
    <div class="form-container mt-5">
        <form action="save_user.php" class="w-50 mx-auto" method="POST">
            <div class="form-group">
                <label for="owner">Nombre de Usuario:</label>
                <input type="text" name="username" class="form-control rounded-0 shadow-sm" id="username" required>

            </div>

            <div class="form-group">
                <label for="car">Contraseña:</label>
                <input type="password" name="password" class="form-control rounded-0 shadow-sm" id="password" required>

            </div>
            <br>
            <h3 class="text-center"> Informacion personal</h1>

            <div class="form-group">
                <label for="owner">Nombre:</label>
                <input type="text" name="nombre" class="form-control rounded-0 shadow-sm" id="nombre" required>

            </div>

            <div class="form-group">
                <label for="owner">Documento:</label>
                <input type="number" name="documento" class="form-control rounded-0 shadow-sm" id="documento" required>

            </div>
            <div class="form-group">
                <label for="owner">Correo Electronico:</label>
                <input type="text" name="email" class="form-control rounded-0 shadow-sm" id="email" required>

            </div>

            <br>
            <h3 class="text-center"> Informacion del parqueadero</h1>
            <br>

            <div class="form-group">
                <label for="owner">Nombre del parqueadero:</label>
                <input type="text" name="nombreparqueadero" class="form-control rounded-0 shadow-sm" id="nombreparqueadero" required>

            </div>

            <div class="form-group">
                <label for="owner">Direccion del parqueadero:</label>
                <input type="text" name="direccionparqueadero" class="form-control rounded-0 shadow-sm" id="direccionparqueadero" required>

            </div>

            <div class="row">
                <div class="col-6">
                    <label for="capacidad">Capacidad:</label>
                    <input type="number" name="capacidad" class="form-control rounded-0 shadow-sm" id="capacidad" required>
                </div>
                <div class="col-6">
                    <label for="tarifa">Tarifa por hora:</label>
                    <input type="number" name="tarifa" class="form-control rounded-0 shadow-sm" id="tarifa" required>
                </div>
            </div>
            <br>

            <div class="form-group">
                <label for="owner">Horario:</label>
                <input type="text" name="horario" class="form-control rounded-0 shadow-sm" id="horario" required>

            </div>
            <br>

            <h3 class="text-center justify"> Ubicacion del parqueadero</h1>
            <br>
            <p>Aqui podra ingresar las coordenadas del parqueadero manualmente para mas precision, o pulsar el boton de agregar ubicacion y la pagina le pedira permisos de ubicacion, una vez los acepte se llenaran de manera automatica a los campos correspondientes</p>
            <br>
            <div class="row">

                <div class="col-6">
                    <label for="capacidad">Latitud:</label>
                    <input type="number" step="0.00000001" name="latitud" class="form-control rounded-0 shadow-sm" id="latitud" required>
                </div>
                <div class="col-6">
                    <label for="tarifa">Longitud:</label>
                    <input type="number" step="0.00000001" name="longitud" class="form-control rounded-0 shadow-sm" id="longitud" required>
                </div>


            </div>

            <a onclick="findMe()" class="btn mx-auto d-block mt-5 rounded-1 shadow" id="btnOne" name="save_user" value="Save User">Agregar Ubicacion</a>

            

            <button type="submit" class="btn mx-auto d-block mt-5 rounded-1 shadow" id="btnOne" name="save_user" value="Save User">Registrarse</button>

        </form>
        <br><br><br><br>
    </div>


<script>

function findMe(){


if(navigator.geolocation) {
}
else{
    alert("Tu navegador no soporta geolocalizacion, ingresela manualmente");
}

function localizacion(posicion){
    var latitud = posicion.coords.latitude;
    var longitud = posicion.coords.longitude;

    $("#latitud").val(latitud);
    $("#longitud").val(longitud);


}

function error(){
    alert("No se puedo obtener la ubicacion, ingresela manualmente");

}

navigator.geolocation.getCurrentPosition(localizacion,error);


}
</script>







    <?php include("./Includes/footer.php") ?>