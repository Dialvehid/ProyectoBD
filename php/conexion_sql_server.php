<?php 
$servername = '(localdb)\CRIGER';
try  
{  
    $conn = new PDO( "sqlsrv:server=$servername ; Database=aeropuerto", "criger1398", "prueba");  
}  catch(PDOExcepction $e) {
    echo $e;
}
