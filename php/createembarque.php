<?php 
require ("conexion_sql_server.php");


if (isset($_POST['cui_cliente'])){


$cui = $_POST['cui_cliente'];
$reserva = $_POST['reserva_cliente'];
$vuelo = $_POST['id_vuelo'];
$costo = $_POST['costo'];
$fecha = $_POST['fechacompra'];

$sql = "INSERT INTO embarque(cui, reseva, id_vuelo, costo,  fechac) 
        VALUES ('".$cui."', '".$reserva."', '".$vuelo."', '".$costo."', '".$fecha."')";



$statement = $conn->prepare($sql);

if($statement->execute()){
    $mensaje = "Agregado correctamente";
    echo '<div class="alert alert-success">';
    echo $mensaje;
    echo '</div>';
}

}