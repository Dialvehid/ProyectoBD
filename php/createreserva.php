<?php 
require ("conexion_sql_server.php");

if(isset($_POST['asientos_reserva'])){
    $asientos = $_POST['asientos_reserva'];

    $sql = "INSERT INTO resevas(nasientos)
            VALUES('".$asientos."')";
    $statement = $conn->prepare($sql);

    if($statement->execute()){
        $mensaje = "Reserva Agregada Correctamente";
        echo '<div class="alert alert-success">';
        echo $mensaje;
        echo '</div>';
    }
}