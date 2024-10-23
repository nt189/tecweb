<?php

  include('database.php');

// SE OBTIENE LA INFORMACIÓN DEL PRODUCTO ENVIADA POR EL CLIENTE
$producto = file_get_contents('php://input');
$data = array(
    'status'  => 'error',
    'message' => 'ERROR: Producto no actualizado'
);
  if(!empty($producto)) {
    $jsonOBJ = json_decode($producto);
    
    $sql = "SELECT * FROM productos WHERE id = '{$jsonOBJ->id}' AND eliminado = 0";
    $result = mysqli_query($conexion, $sql);

    if ($result->num_rows == 1) {
      $conexion->set_charset("utf8");
      $sql = "UPDATE `productos` SET `nombre`='{$jsonOBJ->nombre}',`marca`='{$jsonOBJ->marca}',`modelo`='{$jsonOBJ->modelo}',`precio`='{$jsonOBJ->precio}',`detalles`='{$jsonOBJ->detalles}',`unidades`='{$jsonOBJ->unidades}',`imagen`='{$jsonOBJ->imagen}' WHERE `id`='{$jsonOBJ->id}'";
      if($conexion->query($sql)){
          $data['status'] =  "success";
          $data['message'] =  "Producto actualizado";
      }
    }
  }
  
  echo json_encode($data, JSON_PRETTY_PRINT);

?>
