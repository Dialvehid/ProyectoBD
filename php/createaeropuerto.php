<?php 
require ("conexion_sql_server.php");

if(isset($_POST['nombre_aeropuerto'])){
    $nombre = $_POST['nombre_aeropuerto'];
    $ubicacion = $_POST['pais_aeropuerto'];

    $sql = "INSERT INTO aeropuerto(nombre, pais)
            VALUES('".$nombre."','".$ubicacion."')";
    $statement = $conn->prepare($sql);

    if($statement->execute()){
        $mensaje = "Aeropuerto Agregada Correctamente";
        echo '<div class="alert alert-success">';
        echo $mensaje;
        echo '</div>';
    }
}