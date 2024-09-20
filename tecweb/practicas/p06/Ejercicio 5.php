<?php
    header('Content-Type: application/xhtml+xml'); // Establece el tipo de contenido como XHTML
    echo '<?xml version="1.0" encoding="UTF-8"?>'; // Prolog XML
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
    <html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
        <head>
            <meta http-equiv="Content-Type" content="application/xhtml+xml; charset=UTF-8" />
            <title>Ejercicio 5</title>
        </head>
        <body>
            <h2>Ejercicio 5 Resultado</h2>
            <?php
                if(isset($_POST["Sexo"]) && isset($_POST["Edad"]) && $_POST["Sexo"] == 'Mujer' && $_POST["Edad"] >= 18 && $_POST["Edad"] <= 35){
                    echo 'Bienvenida, usted está en el rango de edad permitido.';
                    echo '<br/>';
                }
                else{
                    echo 'Error al cargar...';
                }
            ?>
        </body>
    </html>
