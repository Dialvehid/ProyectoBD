<?php require 'php/createaeropuerto.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Crear Aeropuerto</title>
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
          Clientes<span class="sr-only">(current)</span>
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
<body>
  <!-- Formulario para registro de nuevo cliente -->
  <form method="POST" name="crearCliente" enctype="multipart/form-data">
          <h2 class="text-primary"> Nuevo Aeropuerto</h2>  
          <div class="form-group">
            <label for="CampoAeropuerto">Nombre Aeropuerto</label>
            <input 
              type="text" 
              class="form-control" 
              id="nombreAeropuerto" 
              name="nombre_aeropuerto" 
              placeholder="Aurora" 
              required
            >
          </div>
          <div class="form-group">
            <label for="PaisAeropuerto">País del Aeropuerto</label>
            <input 
              type="text" 
              class="form-control" 
              id="paisAeropuerto" 
              name="pais_aeropuerto" 
              placeholder="Guatemala"
            >
          </div>
         
          <div class="form-group">
              <!-- Boton para enviar los datos a la base de datos -->
              <a onclick="return confirm('Esta seguro de registrar el aeropuerto?')">
                <button type="submit" 
                value="Registrar Cliente" 
                name ="send" 
                class="btn btn-info">Registrar Aeropuerto </button>
              </a>
          </div>
        </form>
    
    <!-- Final del index -->

    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>