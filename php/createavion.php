<?php 
require ("conexion_sql_server.php");

if(isset($_POST['plazas_avion'])){
    $plazas = $_POST['plazas_avion'];

    $sql = "INSERT INTO aviones(nplaza, ndisponibles)
            VALUES('".$plazas."','".$plazas."')";
    $statement = $conn->prepare($sql);

    if($statement->execute()){
        $mensaje = "Avion Agregado Correctamente";
        echo '<div class="alert alert-success">';
        echo $mensaje;
        echo '</div>';
    }
}