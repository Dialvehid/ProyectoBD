<?php 
require ("conexion_sql_server.php");


if (isset($_POST['cui_cliente'])){


$cui = $_POST['cui_cliente'];
$name = $_POST['nombre_cliente'];
$last = $_POST['apellido_cliente'];
$add = $_POST['direccion_cliente'];
$card = $_POST['tarjeta_cliente'];
$cel = $_POST['telefono_cliente'];

$sql = "INSERT INTO cliente(cui, nombres, apellidos, direccion, tjtC, tel) 
        VALUES ('".$cui."', '".$name."', '".$last."', '".$add."', '".$card."', '".$cel."')";

$statement = $conn->prepare($sql);


if($statement->execute()){
    $mensaje = "Agregado correctamente";
    echo '<div class="alert alert-success">';
    echo $mensaje;
    echo '</div>';
}

}