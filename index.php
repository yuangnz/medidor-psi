<!DOCTYPE html>
<link rel="stylesheet" href="styles.css">
<html>
<head>
  <title>Formulario de Registro de Pozos</title>
  <!-- Agregar enlaces a los archivos CSS de Bootstrap -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
  <div class="menu-rapido">
        <ul>
            <li><a href="index.php">Registrar pozo</a></li>
            <li><a href="lector_json.html">Medidor de PSI</a></li>
        </ul>
  </div>
  <div class="container">
    <h2>Formulario de Registro de Pozos</h2>
    <form method="POST" action="guardar_datos.php">
      <div class="form-group">
        <label for="ubicacion">Ubicación del pozo:</label>
        <input type="text" class="form-control" id="ubicacion" name="ubicacion" required>
      </div>
      <div class="form-group">
        <label for="nombre">Nombre del pozo:</label>
        <input type="text" class="form-control" id="nombre" name="nombre" required>
      </div>
      <div class="form-group">
        <label for="tipo">Tipo de pozo:</label>
        <input type="text" class="form-control" id="tipo" name="tipo" required>
      </div>
      <div class="form-group">
        <label for="psi">PSI (Número):</label>
        <input type="number" class="form-control" id="psi" name="psi" required>
      </div>
      <div class="form-group">
        <label for="fecha">Fecha de creación:</label>
        <input type="date" class="form-control" id="fecha" name="fecha" required>
      </div>
      <button type="submit" class="btn btn-primary">Guardar</button>
    </form>

    <h2>Tabla de Registros</h2>
    <table class="table">
      <thead>
        <tr>
          <th>Ubicación</th>
          <th>Nombre</th>
          <th>Tipo</th>
          <th>PSI</th>
          <th>Fecha de Creación</th>
        </tr>
      </thead>
      <tbody>
        <?php
          $data = file_get_contents('registros.json');
          $registros = json_decode($data, true);

          foreach ($registros as $registro) {
            echo '<tr>';
            echo '<td>' . $registro['ubicacion'] . '</td>';
            echo '<td>' . $registro['nombre'] . '</td>';
            echo '<td>' . $registro['tipo'] . '</td>';
            echo '<td>' . $registro['psi'] . '</td>';
            echo '<td>' . $registro['fecha'] . '</td>';
            echo '</tr>';
          }
        ?>
      </tbody>
    </table>
  </div>

  <!-- Agregar enlaces a los archivos JS de Bootstrap -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
