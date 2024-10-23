<?php

  include('database.php');

// SE OBTIENE LA INFORMACIÓN DEL PRODUCTO ENVIADA POR EL CLIENTE
$producto = file_get_contents('php://input');
$data = array(
    'status'  => 'error',
    'message' => ''
);
  if(!empty($producto)) {
    $jsonOBJ = json_decode($producto);
    
    $sql = "UPDATE `productos` SET `nombre`='{$jsonOBJ->nombre}',`marca`='{$jsonOBJ->marca}',`modelo`='{$jsonOBJ->modelo}',`precio`='{$jsonOBJ->precio}',`detalles`='{$jsonOBJ->detalles}',`unidades`='{$jsonOBJ->unidades}',`imagen`='{$jsonOBJ->imagen}' WHERE `id`='{$jsonOBJ->id}'";
    $result = mysqli_query($conexion, $sql);

    if ($result) {
      $data['status'] =  "success";
      $data['message'] =  "Se ha actualizado el producto";
    }else {
      $data['message'] = "ERROR: No pudo actualizar le producto con el id: $jsonOBJ->id;";
    }
    echo json_encode($data, JSON_PRETTY_PRINT);  
  }

?>
