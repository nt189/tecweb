<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        use EJEMPLOS\POO\Cabecera as Cabecera;

        require_once __DIR__ . '/Cabecera.php';

        $cab =  new Cabecera( 'El rincon del programador', 'center' );
        $cab->graficar();
    ?>
</body>
</html>