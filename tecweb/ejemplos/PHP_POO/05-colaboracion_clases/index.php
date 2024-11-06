<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        require_once __DIR__ . '/Pagina.php';

        $pag = new Pagina('El atico del programador', 'center', 'El sotano del programador');

        for ($i=0 ; $i < 11 ; $i++){
            $pag->insertar_cuerpo('Hola '. $i);
        }

        $pag->graficar();
    ?>
</body>
</html>