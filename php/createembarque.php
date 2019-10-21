<?php 
require ("conexion_sql_server.php");


if (isset($_POST['cui_cliente'])){


$cui = $_POST['cui_cliente'];
$reserva = $_POST['reserva_cliente'];

$sql = "INSERT INTO embarque(cui, reseva) 
        VALUES ('".$cui."', '".$reserva."')";

$statement = $conn->prepare($sql);


if($statement->execute()){
    $mensaje = "Agregado correctamente";
    echo '<div class="alert alert-success">';
    echo $mensaje;
    echo '</div>';
}

}