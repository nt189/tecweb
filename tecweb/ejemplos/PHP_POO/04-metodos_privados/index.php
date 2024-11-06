<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        require_once __DIR__ . '/Tabla.php';

        $tab = new Tabla( 2, 3, 'border: 1px solid;');
        $tab->cargar( 0, 0, 'A' );
        $tab->cargar( 0, 0, 'B' );
        $tab->cargar( 0, 0, 'C' );

        $tab->graficar();
    ?>
</body>
</html>