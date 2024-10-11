<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN"
"http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es">
	<?php
    $data = array();

		/** SE CREA EL OBJETO DE CONEXION */
		@$link = new mysqli('localhost', 'root', 'zP*liGgdxEbBXjyk', 'marketzone');
        /** NOTA: con @ se suprime el Warning para gestionar el error por medio de código */

		/** comprobar la conexión */
		if ($link->connect_errno) 
		{
			die('Falló la conexión: '.$link->connect_error.'<br/>');
			//exit();
		}

		/** Crear una tabla que no devuelve un conjunto de resultados */
		if ( $result = $link->query("SELECT * FROM productos WHERE eliminado != 1") ) 
		{
            /** Se extraen las tuplas obtenidas de la consulta */
			$row = $result->fetch_all(MYSQLI_ASSOC);

            /** Se crea un arreglo con la estructura deseada */
            foreach($row as $num => $registro) {            // Se recorren tuplas
                foreach($registro as $key => $value) {      // Se recorren campos
                    $data[$num][$key] = ($value);
                }
            }

			/** útil para liberar memoria asociada a un resultado con demasiada información */
			$result->free();

		$link->close();

	}
	?>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<title>Producto</title>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
		<script>
            function show() {
                // se obtiene el id de la fila donde está el botón presinado
                var rowId = event.target.parentNode.parentNode.id;

                // se obtienen los datos de la fila en forma de arreglo
                var data = document.getElementById(rowId).querySelectorAll(".row-data");
                /**
                querySelectorAll() devuelve una lista de elementos (NodeList) que 
                coinciden con el grupo de selectores CSS indicados.
                (ver: https://developer.mozilla.org/en-US/docs/Web/CSS/CSS_Selectors)

                En este caso se obtienen todos los datos de la fila con el id encontrado
                y que pertenecen a la clase "row-data".
                */

                var id = 'id=' + data[0].innerHTML;
				var nombre = 'nombre=' + data[1].innerHTML;
				var marca = 'marca=' + data[2].innerHTML;
				var modelo = 'modelo=' + data[3].innerHTML;
				var precio = 'precio=' + data[4].innerHTML;
				var unidades = 'unidades=' + data[5].innerHTML;
				var detalles = 'detalles=' + data[6].innerHTML;
				var imagen = 'imagen=' + (data[7].innerHTML).slice(10,-2);
				

				var urlForm = "http://localhost:8080/tecweb/practicas/p09/formulario_productos_v2.php";

                window.open(urlForm+"?"+nombre+"&"+marca+"&"+modelo+"&"+precio+"&"+unidades+"&"+detalles+"&"+imagen+"&"+id)
            }
        </script>
	</head>
	<body>
		<h3>PRODUCTO</h3>

		<br/>
		
		<?php if( isset($row) ) : ?>
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
					<th scope="col"></th>
					</tr>
				</thead>
				<tbody>
					<?php foreach($row as $row) : ?>
					<tr id="<?= $row['id']?>">
						<th scope="row" class="row-data"><?= $row['id'] ?></th>
						<td class="row-data"><?= $row['nombre'] ?></td>
						<td class="row-data"><?= $row['marca'] ?></td>
						<td class="row-data"><?= $row['modelo'] ?></td>
						<td class="row-data"><?= $row['precio'] ?></td>
						<td class="row-data"><?= $row['unidades'] ?></td>
						<td class="row-data"><?= $row['detalles'] ?></td>
						<td class="row-data"><img src=<?= $row['imagen'] ?> width="150" height="150"></td>
						<td><input type="button" onclick="show()" value="Modificar"></td>
					</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
			<script>
		<?php elseif(!empty($id)) : ?>

			 <script>
                alert('El ID del producto no existe');
             </script>

		<?php endif; ?>
	</body>
</html>