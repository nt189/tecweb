<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN"
"http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es">
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
if ( $sqlval = $link->query("SELECT * FROM productos") ) 
		{
            /** Se extraen las tuplas obtenidas de la consulta */
			$row = $sqlval->fetch_all(MYSQLI_ASSOC);

            /** Se crea un arreglo con la estructura deseada */
            foreach($row as $num => $registro) {            // Se recorren tuplas
                foreach($registro as $key => $value) {      // Se recorren campos
                    $data[$num][$key] = ($value);
                }
            }

			/** útil para liberar memoria asociada a un resultado con demasiada información */
			$sqlval->free();
		}

$val = false;
foreach($data as $dat){
    if($dat['nombre'] == $nombre && $dat['modelo'] == $modelo && $dat['marca'] == $marca){
        $val = true;
    }
}

// echo 'resultado de val:'.$val;

/** Crear una tabla que no devuelve un conjunto de resultados */
// $sql = "INSERT INTO productos VALUES (null, '{$nombre}', '{$marca}', '{$modelo}', {$precio}, '{$detalles}', {$unidades}, 'img/{$imagen}', 0)";
   $sql = "INSERT INTO productos (id, nombre, marca, modelo, precio, detalles, unidades, imagen, eliminado) VALUES (null, '{$nombre}', '{$marca}', '{$modelo}', {$precio}, '{$detalles}', {$unidades}, 'img/{$imagen}', 0)";
if (!$val){
    if( $link->query($sql) ){
        echo 'Producto insertado con ID: '.$link->insert_id;
        $idi=$link->insert_id;
    }
    else{
        echo 'El Producto no pudo ser insertado =(';
    }
}
else{
	echo 'El Producto no pudo ser insertado =(, se esta repitiendo el producto: Nombre:'.$nombre.'. Marca:'.$marca.'. Modelo:'.$modelo.'.';
}

$link->close();
?>
<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<title>Producto</title>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	</head>
	<body>
		<h3>PRODUCTO</h3>

		<br/>
		
		<?php if( isset($row) && !$val) : ?>

			<table class="table">
				<thead class="thead-dark">
					<tr>
					<th scope="col">#</th>
					<th scope="col">Nombre</th>
					<th scope="col">Marca</th>
					<th scope="col">Modelo</th>
					<th scope="col">Precio</th>
					<th scope="col">Unidades</th>
					<th scope="col">Detalles</th>
					<th scope="col">Imagen</th>
					<th scope="col">eliminado</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<th scope="row"><?= $idi ?></th>
						<td><?= $nombre ?></td>
						<td><?= $marca ?></td>
						<td><?= $modelo ?></td>
						<td><?= $precio ?></td>
						<td><?= $unidades ?></td>
						<td><?= $detalles ?></td>
						<td><img src=<?= 'img/'.$imagen ?> width="150" height="150"></td>
						<td><?= 0 ?></td>
					</tr>
				</tbody>
			</table>

		<?php elseif(!empty($id)) : ?>

			 <script>
                alert('El ID del producto no existe');
             </script>

		<?php endif; ?>
	</body>
</html>