<?php 
$servername = '(localdb)\CRIGER';
try  
{  
    $conn = new PDO( "sqlsrv:server=$servername ; Database=aeropuerto", "prueba", "prueba");  
    $conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );  
    echo "Conexion Exitosa a Aeropuerto";
}  
catch(Exception $e)  
    {   
    die( print_r( $e->getMessage() ) );   
} 