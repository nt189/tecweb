<?php
    include_once __DIR__.'/database.php';

    // SE OBTIENE LA INFORMACIÓN DEL PRODUCTO ENVIADA POR EL CLIENTE
    $producto = file_get_contents('php://input');
    if(!empty($producto)) {
        // SE TRANSFORMA EL STRING DEL JASON A OBJETO
        $jsonOBJ = json_decode($producto);
        
        // Extrae los datos del producto
        $nombre = $jsonOBJ->nombre;
        $marca = $jsonOBJ->marca;
        $modelo = $jsonOBJ->modelo;
        $precio = $jsonOBJ->precio;
        $detalles = $jsonOBJ->detalles;
        $unidades = $jsonOBJ->unidades;
        $imagen = $jsonOBJ->imagen;

        // Verifica si el producto ya existe
        $sql = "SELECT * FROM productos WHERE nombre = ? AND eliminado = 0";
        $stmt = $conexion->prepare($sql);
        $stmt->bind_param("s", $nombre);
        $stmt->execute();
        $resultados = $stmt->get_result();

        if ($resultados->num_rows > 0) {
            echo 'El Producto ya existe';
            $stmt->close();
            $conexion->close();
            exit;
        }

        $sql = "INSERT INTO productos VALUES (null, '{$nombre}', '{$marca}', '{$modelo}', {$precio}, '{$detalles}', {$unidades}, '{$imagen}', 0)";
        if ( $conexion->query($sql) ) 
        {
            echo 'Producto insertado con ID: '.$conexion->insert_id;
        }
        else
        {
            echo 'El Producto no pudo ser insertado =(';
        }

        // echo '[SERVIDOR] Nombre: '.$jsonOBJ->nombre;
    }
?>