<?php 
require ("conexion_sql_server.php");


if (isset($_POST['fecha_salida'])){

$fecha_salida = $_POST['fecha_salida'];
$fecha_llegada = $_POST['fecha_llegada'];
$aeropuerto_salida = $_POST['aeropuertoSalida'];
$aeropuerto_llegada = $_POST['aeropuertoDestino'];
$avion = $_POST['avion'];

$sql = "INSERT INTO vuelo(fsale, fllega, aesale, aellega, avion) 
        VALUES ('".$fecha_salida."', '".$fecha_llegada."','".$aeropuerto_salida."', '".$aeropuerto_llegada."', '".$avion."')";

$statement = $conn->prepare($sql);


if($statement->execute()){
    $mensaje = "Agregado correctamente";
    echo '<div class="alert alert-success">';
    echo $mensaje;
    echo '</div>';
}

}