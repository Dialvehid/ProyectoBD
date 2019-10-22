<?php 
  require 'php/conexion_sql_server.php';
  require 'php/createvuelo.php';
  $sql = "SELECT * FROM aeropuerto";
  $statement = $conn->prepare($sql);
  $statement->execute();
  $aeropuertos = $statement->fetchAll(PDO::FETCH_OBJ);

  $sql2 = "SELECT * FROM aviones";
  $statement2 = $conn->prepare($sql2);
  $statement2->execute();
  $aviones = $statement2->fetchAll(PDO::FETCH_OBJ);

  $sql3 = "SELECT * FROM embarque";
  $statement3 = $conn->prepare($sql3);
  $statement3->execute();
  $embarques = $statement3->fetchAll(PDO::FETCH_OBJ);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Registrar Vuelo</title>
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
    
  <!-- Formulario para registro de nuevo cliente -->
  <form method="POST" name="crearCliente" enctype="multipart/form-data">
          <h2 class="text-primary"> Nuevo Vuelo</h2>  
          <div class="form-group">
            <label for="FechaSalida">Fecha Salida</label>
            <input 
              type="date" 
              class="form-control" 
              id="fechaSalida" 
              name="fecha_salida"
              required
            >
          </div>
          <div class="form-group">
            <label for="FechaLlegada">Fecha Llegada</label>
            <input 
              type="date" 
              class="form-control" 
              id="fechaLlegada" 
              name="fecha_llegada" 
              required
            >
          </div>
          <div class="form-group">
            <label for="AeropuertoSalida">Aeropuerto Salida</label>
            <select name="aeropuertoSalida" 
              id="aeropuerto_salida" 
              class="form-control">
              <?php foreach($aeropuertos as $aeropuerto): ?>
                <option value="<?= $aeropuerto->cod; ?>" class="form-control"><?= $aeropuerto->nombre; ?></option>
              <?php endforeach; ?>
            </select>
          </div>
          <div class="form-group">
            <label for="AeropuertoDestino">Aeropuerto Destino</label>
            <select name="aeropuertoDestino" 
              id="aeropuerto_destino" 
              class="form-control">
              <?php foreach($aeropuertos as $aeropuerto): ?>
                <option value="<?= $aeropuerto->cod; ?>" class="form-control"><?= $aeropuerto->nombre; ?></option>
              <?php endforeach; ?></select>
          </div>
          <div class="form-group">
            <label for="Avion">Código Avion</label>
            <select name="avion" 
              id="Avion" 
              class="form-control">
              <?php foreach($aviones as $avion): ?>
                <option value="<?= $avion->cod; ?>" class="form-control"><?= $avion->cod; ?></option>
              <?php endforeach; ?></select>
            </select>
          </div>
          <div class="form-group">
            <label for="NumeroEmbarque">No. Embarque</label>
            <select name="NumeroEmbarque" 
              id="embarque" 
              class="form-control">
              <?php foreach($embarques as $embarque): ?>
                <option value="<?= $embarque->cod; ?>" class="form-control"><?= $embarque->cod; ?></option>
              <?php endforeach; ?></select>
            </select>
          </div>
          <div class="form-group">
              <!-- Boton para enviar los datos a la base de datos -->
              <a onclick="return confirm('Esta seguro de registrar el vuelo?')">
                <button type="submit" 
                value="Registrar Vuelo" 
                name ="send" 
                class="btn btn-info">Registrar Vuelo </button>
              </a>
          </div>
        </form>
    
    <!-- Final del index -->

    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>