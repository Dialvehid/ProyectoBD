<?php 
require ("conexion_sql_server.php");


if (isset($_POST['id'])){

$id = $_POST['id'];
$nombre = $_POST['nombre_aeropuerto'];
$pais = $_POST['pais_aeropuerto'];

$sql = "UPDATE aeropuerto SET nombre = '".$nombre."',
        pais = '".$pais."'
        WHERE cod = '".$id."' ";

$statement = $conn->prepare($sql);


if($statement->execute()){
    $mensaje = "Editado correctamente";
    echo '<div class="alert alert-success">';
    echo $mensaje;
    echo '</div>';
}

}