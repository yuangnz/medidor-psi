<?php
  // Obtener los datos del formulario
  $ubicacion = $_POST['ubicacion'];
  $nombre = $_POST['nombre'];
  $tipo = $_POST['tipo'];
  $psi = $_POST['psi'];
  $fecha = $_POST['fecha'];

  // Crear un arreglo con los datos
  $registro = array(
    'ubicacion' => $ubicacion,
    'nombre' => $nombre,
    'tipo' => $tipo,
    'psi' => $psi,
    'fecha' => $fecha
  );

  // Obtener los registros existentes del archivo JSON
  $data = file_get_contents('registros.json');
  $registros = json_decode($data, true);

  // Agregar el nuevo registro al arreglo existente
  $registros[] = $registro;

  // Convertir los registros a formato JSON
  $json = json_encode($registros);

  // Guardar los registros en el archivo JSON
  file_put_contents('registros.json', $json);

  // Redirigir de vuelta a la página del formulario
  header('Location: index.php');
?>
