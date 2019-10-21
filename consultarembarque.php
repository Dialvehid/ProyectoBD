<?php 
  require 'php/conexion_sql_server.php';
  $sql = "SELECT e.cod AS codigo_embarque,
    c.cui AS cui, e.reseva AS reserva
   FROM embarque AS e INNER JOIN cliente AS c 
   ON e.cui = c.id";
  $statement = $conn->prepare($sql);
  $statement->execute();
  $embarques = $statement->fetchAll(PDO::FETCH_OBJ);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Consultar Embarque</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/main.css">
</head>

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
          <th>Código de Embarque</th>
          <th>Código CUI Asignado</th>
          <th>Código de Reserva</th>
          <th>Eliminar</th>
        </tr>
        <?php foreach($embarques as $embarque): ?>
        <tr>
          <td><?= $embarque->codigo_embarque; ?></td>
          <td><?= $embarque->cui; ?></td>
          <td><?= $embarque->reserva; ?></td>
          <td><button type="button" class="btn btn-danger"><a onclick="return confirm('Esta seguro de eliminar el embarque?')" href="php/eliminarembarque.php?borrar=<?php echo $embarque->codigo_embarque ?>"> Eliminar </button>  </td></a>
        </tr>
        <?php endforeach; ?>
      
      
      </table>

<body>


    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>