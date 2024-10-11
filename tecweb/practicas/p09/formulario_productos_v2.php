<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario productos</title>
    <script src="formulario.js"></script>
</head>
<body>
    <h2>Formulario de Producto</h2>
    <fieldset>
        <legend>Actualizar datos del producto</legend>
        <p>Los campos marcados con un * son obligatorios</p>
        <form id="formularioTenis" action="http://localhost:8080/tecweb/practicas/p09/update_producto.php?id=<?= $_GET['id']?>" method="post">
            <fieldset>
                <label for="nombre">Nombre del Producto*: </label><span style="color: red;" id="msnombre"></span><br>
                <input type="text" id="nombre" name="nombre" value="<?= $_GET['nombre']?>">
            </fieldset>

            <fieldset>
                <label for="marca">Marca*: </label><span style="color: red;" id="msmarca"></span><br>
                <input type="text" id="marca" name="marca" value="<?= $_GET['marca']?>">
            </fieldset>

            <fieldset>
                <label for="modelo">Modelo*: </label><span style="color: red;" id="msmodelo"></span><br>
                <input type="text" id="modelo" name="modelo" value="<?= $_GET['modelo']?>">
            </fieldset>

            <fieldset>
                <label for="precio">Precio*: </label><span style="color: red;" id="msprecio"></span><br>
                <input type="number" id="precio" name="precio" step="0.01" value="<?= $_GET['precio']?>">
            </fieldset>

            <fieldset>
                <label for="detalles">Detalles del Producto: </label><span style="color: red;" id="msdetalles"></span><br>
            <textarea id="detalles" name="detalles" rows="4" cols="50" maxlength="300"><?= $_GET['detalles']?></textarea><br><br>
            </fieldset>

            <fieldset>
                <label for="unidades">Unidades Disponibles*: </label><span style="color: red;" id="msunidades"></span><br>
                <input type="number" id="unidades" name="unidades" value="<?= $_GET['unidades']?>">
            </fieldset>

            <fieldset>
                <label for="imagen">Imagen del Producto: </label><span id="msimagen"><?= $_GET['imagen']?></span></span><br>
                <input type="file" id="imagen" name="imagen" accept="image/*">
            </fieldset>
            <br>
            <input type="submit" value="Enviar" onclick="validador()">
        </form>
    </fieldset>
</body>
</html>