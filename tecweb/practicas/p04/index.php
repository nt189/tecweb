<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>Práctica 3</title>
</head>
<body>
    <h2>Ejercicio 1</h2>
    <p>Determina cuál de las siguientes variables son válidas y explica por qué:</p>
    <p>$_myvar,  $_7var,  myvar,  $myvar,  $var7,  $_element1, $house*5</p>
    <?php
        //AQUI VA MI CÓDIGO PHP
        $_myvar;
        $_7var;
        //myvar;       // Inválida
        $myvar;
        $var7;
        $_element1;
        //$house*5;     // Invalida
        
        echo '<h4>Respuesta:</h4>';   
    
        echo '<ul>';
        echo '<li>$_myvar es válida porque inicia con guión bajo.</li>';
        echo '<li>$_7var es válida porque inicia con guión bajo.</li>';
        echo '<li>myvar es inválida porque no tiene el signo de dolar ($).</li>';
        echo '<li>$myvar es válida porque inicia con una letra.</li>';
        echo '<li>$var7 es válida porque inicia con una letra.</li>';
        echo '<li>$_element1 es válida porque inicia con guión bajo.</li>';
        echo '<li>$house*5 es inválida porque el símbolo * no está permitido.</li>';
        echo '</ul>';

        unset($_myvar, $_7var, $myvar, $var7, $_element1);
        echo '<hr>';
        //-------------------------------Ejercicio2---------------------------------
        echo '<h2>Ejercicio 2</h2>';
        echo 'Proporcionar los valores de $a, $b, $c como sigue:<br>';
        echo    '<p>
                    $a = ”ManejadorSQL”;<br>
                    $b = "MySQL";<br>
                    $c = &$a;
                </p>';

        $a = "ManejadorSQL";
        $b = 'MySQL';
        $c = &$a;

        echo '<p>a) Ahora muestra el contenido de cada variable</p>';
        echo $a."<br>";
        echo $b."<br>";
        echo $c."<br>";

        echo    '<p>b) Agrega al código actual las siguientes asignaciones</p>
                <p>$a = “PHP server”<br>
                    $b = &$a
                </p>';

        $a = "PHP server";
        $b = &$a;

        echo '<p>c) Vuelve a mostrar el contenido de cada uno</p>';
        echo $a."<br>";
        echo $b."<br>";

        echo    '<p>
                    d) Describe en y muestra en la página obtenida qué ocurrió en el segundo bloque de asignaciones</p>
                    <p>$c = &$a; asigna $c como referencia de $a, lo que significa que ambos apuntan al mismo valor en memoria.<br>
                    Al reasignar $a, tanto $a como $c cambian, porque comparten la referencia.<br>
                    Después de asignar $b = &$a, $b también apunta al valor de $a.
                /p>';

        unset($a, $b, $c);
        echo '<hr>';
 
    ?>

</body>
</html>
