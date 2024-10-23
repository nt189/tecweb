<?php

  include('database.php');

  if(isset($_POST['id'])) {
    $id = mysqli_real_escape_string($conexion, $_POST['id']);

    $query = "SELECT * from productos WHERE id = {$id}";

    $result = mysqli_query($conexion, $query);
    if(!$result) {
      die('Query Failed'. mysqli_error($conexion));
    }

    $data = array();
    while($row = mysqli_fetch_array($result)) {
      $data[] = array(
        'nombre' => $row['nombre'],
        'marca'  => $row['marca'],
        'modelo' => $row['modelo'],
        'precio' => $row['precio'],
        'detalles' => $row['detalles'],
        'unidades' => $row['unidades'],
        'imagen'   => $row['imagen'],
        'id' => $row['id']
      );
    }
    echo json_encode($data, JSON_PRETTY_PRINT);
  }

?>
