<?php 
$servername = '(localdb)\CRIGER';
try  
{  
    $conn = new PDO( "sqlsrv:server=$servername ; Database=aeropuerto", "prueba", "prueba");  
}  catch(PDOExcepction $e) {
    echo $e;
}
