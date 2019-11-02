<<<<<<< HEAD
<?php 
$servername = '(localdb)\CRIGER';
try  
{  
    $conn = new PDO( "sqlsrv:server=$servername ; Database=aeropuerto", "criger1398", "prueba");  
}  catch(PDOExcepction $e) {
    echo $e;
}
=======
<?php 
$servername = 'sql.freeasphost.net\MSSQL2016';
try  
{  
    $conn = new PDO( "sqlsrv:server=$servername ; Database=criger1398_aeropuerto", "criger1398", "prueba");  
}  catch(PDOExcepction $e) {
    echo $e;
}
>>>>>>> 29aa50b45ac62cc8a88ec8d53e43011baa8e2798
