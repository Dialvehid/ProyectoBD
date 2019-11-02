<?php 
  require 'php/conexion_sql_server.php';
  $sql = "SELECT * FROM resumen";
  $statement = $conn->prepare($sql);
  $statement->execute();
  $resumenes = $statement->fetchAll(PDO::FETCH_OBJ);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Proyecto Bd</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/main.css">
</head>
<header>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
          <a class="navbar-brand" href="index.jsp">Aeropuerto</a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
              <li class="nav-item active">
                <a class="nav-link" href="index.php">Inicio<span class="sr-only">(current)</span></a>
              </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Clientes
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="crearcliente.php">Crear Nuevo Cliente</a>
                <a class="dropdown-item" href="consultarcliente.php">Consultar Clientes</a>
              </div>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Reservas
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="crearreserva.php">Crear Nueva Reserva</a>
                <a class="dropdown-item" href="consultarreserva.php">Consultar Reservas</a>
              </div>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Embarques
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="crearembarque.php">Crear Nuevo Embarque</a>
                <a class="dropdown-item" href="consultarembarque.php">Consultar Embarques</a>
              </div>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Aviones
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="crearavion.php">Registrar Nuevo Avion</a>
                <a class="dropdown-item" href="consultaravion.php">Consultar Aviones</a>
              </div>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Aeropuertos
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="crearaeropuerto.php">Registrar Nuevo Aeropuerto</a>
                <a class="dropdown-item" href="consultaraeropuerto.php">Consultar Aeropuertos</a>
              </div>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Vuelos
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="crearvuelo.php">Registrar Nuevo Vuelo</a>
                <a class="dropdown-item" href="consultarvuelo.php">Consultar Vuelos</a>
              </div>
            </li>      

            </ul>
          </div>
        </nav>
        
        <button onclick="exportTableToExcel('textTable')">EXCEL</button>
        <button onclick="exportTableToPDF('textTable')">PDF</button>


        <table class="table table-bordered" style="width: 75% !important; margin:3% auto;" id="textTable">
        <tr>
          <th>Nombres</th>
          <th>Codigo de Vuelo</th>
          <th>No Ticket</th>
          <th>Aeropuerto Salida</th>
          <th>Aeropuerto Llegada</th>
          <th>Fecha Salida</th>
          <th>Fecha Llegada</th>
        </tr>
        <?php foreach($resumenes as $resumen): ?>
        <tr>
          <td><?= $resumen->NOMBRES; ?></td>
          <td><?= $resumen->CODIGO_VUELO; ?></td>
          <td><?= $resumen->NO_TICKET; ?></td>
          <td><?= $resumen->AEROPUERTO_SALIDA; ?></td>
          <td><?= $resumen->AEROPUERTO_LLEGADA; ?></td>
          <td><?= $resumen->FECHA_SALIDA; ?></td>
          <td><?= $resumen->FECHA_LLEGADA; ?></td>
          
          </tr>
        <?php endforeach; ?>
      
      
      </table>

  </header>   
  <body>



    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/export.js"></script>
 </body>
</html>