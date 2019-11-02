<?php 
$servername = 'sql.freeasphost.net\MSSQL2016';
try  
{  
    $conn = new PDO( "sqlsrv:server=$servername ; Database=criger1398_aeropuerto", "criger1398", "prueba");  
}  catch(PDOExcepction $e) {
    echo $e;
}
