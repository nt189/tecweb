<?php
include_once __DIR__.'/database.php';

// SE CREA EL ARREGLO QUE SE VA A DEVOLVER EN FORMA DE JSON
$data = array();

if (isset($_POST['nombre'])) {
    $nombre = $conexion->real_escape_string($_POST['nombre']); // Escapar entrada

    // SE REALIZA LA QUERY DE BÚSQUEDA Y AL MISMO TIEMPO SE VALIDA SI HUBO RESULTADOS
    if ($result = $conexion->query("SELECT * FROM productos WHERE nombre = '$nombre'")) {
        // SE OBTIENEN LOS RESULTADOS
        $row = $result->fetch_assoc();

        if (!is_null($row)) {
            // SE CODIFICAN A UTF-8 LOS DATOS Y SE MAPEAN AL ARREGLO DE RESPUESTA
            foreach ($row as $key => $value) {
                $data[$key] = ($value);
            }
            $data['exists'] = true; // Indica que el producto ya existe
        } else {
            $data['exists'] = false; // Indica que el producto no existe
        }
        $result->free();
    } else {
        die('Query Error: ' . mysqli_error($conexion));
    }
    $conexion->close();
}

// SE HACE LA CONVERSIÓN DE ARRAY A JSON
echo json_encode($data, JSON_PRETTY_PRINT);
?>