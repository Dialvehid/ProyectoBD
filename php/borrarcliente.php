<?php 
require ("conexion_sql_server.php");


if(isset($_GET['borrar'])){
    $cui_borrar = $_GET['borrar'];

    $sql = "DELETE FROM cliente WHERE id = '$cui_borrar'";
    $statement = $conn->prepare($sql);
    $statement->execute();
}

if($statement->execute()){
    $mensaje = "Eliminado correctamente";
    echo '<div class="alert alert-danger">';
    echo $mensaje;
    echo '</div>';
    header("location:../consultarcliente.php");
}

