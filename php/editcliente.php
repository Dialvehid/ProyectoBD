<?php 
require ("conexion_sql_server.php");


if (isset($_POST['cui_cliente'])){

$id = $_POST['id'];
$cui = $_POST['cui_cliente'];
$name = $_POST['nombre_cliente'];
$last = $_POST['apellido_cliente'];
$add = $_POST['direccion_cliente'];
$card = $_POST['tarjeta_cliente'];
$cel = $_POST['telefono_cliente'];

$sql = "UPDATE cliente SET cui = '".$cui."', nombres = '".$name."', apellidos = '".$last."', direccion = '".$add."', tjtC = '".$card."', tel = '".$cel."'
        WHERE id = '".$id."' ";

$statement = $conn->prepare($sql);


if($statement->execute()){
    $mensaje = "Editado correctamente";
    echo '<div class="alert alert-success">';
    echo $mensaje;
    echo '</div>';
}

}