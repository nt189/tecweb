<?php
$nombre = $_POST['nombre'];
$marca  = $_POST['marca'];
$modelo = $_POST['modelo'];
$precio = $_POST['precio'];
$detalles = $_POST['detalles'];
$unidades = $_POST['unidades'];
$imagen   = $_POST['imagen'];

/** SE CREA EL OBJETO DE CONEXION */
@$link = new mysqli('localhost', 'root', 'zP*liGgdxEbBXjyk', 'marketzone');	

/** comprobar la conexión */
if ($link->connect_errno) 
{
    die('Falló la conexión: '.$link->connect_error.'<br/>');
    /** NOTA: con @ se suprime el Warning para gestionar el error por medio de código */
}

// Validar que el nombre, modelo y marca no existan ya en la BD
$sql_validacion = "SELECT * FROM productos WHERE nombre = '$nombre' AND marca = '$marca' AND modelo = '$modelo'";
$stmt = $link->query($sql_validacion);
echo $resultado;

/** Crear una tabla que no devuelve un conjunto de resultados */
// $sql = "INSERT INTO productos VALUES (null, '{$nombre}', '{$marca}', '{$modelo}', {$precio}, '{$detalles}', {$unidades}, '{$imagen}')";
// if ( $link->query($sql) ) 
// {
//     echo 'Producto insertado con ID: '.$link->insert_id;
// }
// else
// {
// 	echo 'El Producto no pudo ser insertado =(';
// }

$link->close();
?>