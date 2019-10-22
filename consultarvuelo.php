<?php 
  require 'php/conexion_sql_server.php';
  $sql = "SELECT 
         v.cod AS Codigo_Vuelo,
         v.aesale AS Aeropuerto_Salida,
         v.aellega AS Aeropuerto_Llegada,
         v.fsale AS Fecha_Salida, 
         v.fllega AS Fecha_Llegada,
         v.embar AS Codigo_Embarque,
         v.avion AS Codigo_Avion
         FROM vuelo AS v INNER JOIN aeropuerto AS a
         ON (v.aesale = a.cod)   ";
  $statement = $conn->prepare($sql);
  $statement->execute();
  $vuelos = $statement->fetchAll(PDO::FETCH_OBJ);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Consultar Vuelo</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/main.css">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
          <a class="navbar-brand" href="index.jsp">Aeropuerto</a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
              <li class="nav-item active">
                <a class="nav-link" href="index.php">Inicio</a>
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
                Reservas<span class="sr-only">(current)</span>
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

        
        <table class="table table-bordered" style="width: 75% !important; margin:3% auto;">
        <tr>
          <th>Codigo Vuelo</th>
          <th>Aeropuerto Salida</th>
          <th>Aeropuerto Llegada</th>
          <th>Fecha Salida</th>
          <th>Fecha Llegada</th>
          <th>Código de Embarque</th>
          <th>Código de Avion</th>
          <th>Eliminar</th>
        </tr>
        <?php foreach($vuelos as $vuelo): ?>
        <tr>
        
          <td><?= $vuelo->Codigo_Vuelo; ?></td>
          <td><?= $vuelo->Aeropuerto_Salida; ?></td>
          <td><?= $vuelo->Aeropuerto_Llegada; ?></td>
          <td><?= $vuelo->Fecha_Salida; ?></td>
          <td><?= $vuelo->Fecha_Llegada; ?></td>
          <td><?= $vuelo->Codigo_Embarque; ?></td>
          <td><?= $vuelo->Codigo_Avion; ?></td>
          <td><button type="button" class="btn btn-danger"><a onclick="return confirm('Esta seguro de eliminar el vuelo?')" href="php/eliminarvuelo.php?borrar=<?php echo $vuelo->Codigo_Vuelo ?>"> Eliminar </button>  </td></a>
        </tr>
        <?php endforeach; ?>
      
      
      </table>
    

    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>