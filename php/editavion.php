<?php 
require ("conexion_sql_server.php");


if (isset($_POST['id'])){

$id = $_POST['id'];
$asientos = $_POST['numero_plazas'];

$sql = "UPDATE aviones SET nplaza = '".$asientos."'
        WHERE cod = '".$id."' ";

$statement = $conn->prepare($sql);


if($statement->execute()){
    $mensaje = "Editado correctamente";
    echo '<div class="alert alert-success">';
    echo $mensaje;
    echo '</div>';
}

}