<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>Práctica 4</title>
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
        //-------------------------------Ejercicio3---------------------------------
        echo '<h2>Ejercicio 3</h2>';
        echo    '<p>Muestra el contenido de cada variable inmediatamente después de cada asignación,<br>
                    verificar la evolución del tipo de estas variables (imprime todos los componentes de los<br>
                    arreglo):
                </p>';

        echo    '<p>
                    $a = “PHP5”;
                    <br>$z[] = &$a;
                    <br>$b = “5a version de PHP”;
                    <br>$c = $b*10;
                    <br>$a .= $b;
                    <br>$b *= $c;
                    <br>$z[0] = “MySQL”;
                </p>';


        $a = "PHP5";
        echo '<br>'.$a.'<br>';

        $z[] = &$a;
        echo $z[0].'<br>';

        $b = "5a version de PHP";
        echo $b.'<br>';

        $c = $b*10;
        echo $c.'<br>';

        $a .= $b;
        echo $a.'<br>';

        $b *= $c;
        echo $b.'<br>';

        $z[0] = "MySQL";
        echo $z[0].'<br>';

        #unset($a, $b, $c, $z);
        echo '<hr>';
        //-------------------------------Ejercicio4---------------------------------
        echo '<h2>Ejercicio 4</h2>';
        echo '<p>
                Lee y muestra los valores de las variables del ejercicio anterior, pero ahora con la ayuda de<br>
                la matriz $GLOBALS o del modificador global de PHP.
             </p>';
             
        function Ejercicio4(){
            $var1 = $GLOBALS['a'];
            $var2 = $GLOBALS['b'];
            $var3 = $GLOBALS['c'];
            $var4 = $GLOBALS['z'];

            echo $var1.'<br>';
            echo $var2.'<br>';
            echo $var3.'<br>';
            echo $var4[0].'<br>';
        }
        Ejercicio4();
        unset($a, $b, $c, $z);
        echo '<hr>';
        //-------------------------------Ejercicio5---------------------------------
        echo '<h2>Ejercicio 5</h2>';
        echo '<p>Dar el valor de las variables $a, $b, $c al final del siguiente script:</p>';
        echo    '<p>
                    $a = “7 personas”;<br>
                    $b = (integer) $a;<br>
                    $a = “9E3”;<br>
                    $c = (double) $a;
                </p>';

        $a = "7 personas";
        echo $a.'<br>';

        $b = (integer) $a;
        echo $b.'<br>';

        $a = "9E3";
        echo $a.'<br>';

        $c = (double) $a;
        echo $c.'<br>';
        echo '<hr>';
        unset($a, $b, $c);
        //-------------------------------Ejercicio6---------------------------------
        echo '<h2>Ejercicio 6</h2>';
        echo    '<p>
                    Dar y comprobar el valor booleano de las variables $a, $b, $c, $d, $e y $f y muéstralas<br>
                    usando la función var_dump(<datos>).<br>
                    Después investiga una función de PHP que permita transformar el valor booleano de $c y $e<br>
                    en uno que se pueda mostrar con un echo:
                </p>';
        echo    '<p>
                    $a = “0”;<br>
                    $b = “TRUE”;<br>
                    $c = FALSE;<br>
                    $d = ($a OR $b);<br>
                    $e = ($a AND $c);<br>
                    $f = ($a XOR $b);
                </p>';

        $a = "0";
        $b = "TRUE";
        $c = FALSE;
        $d = ($a OR $b);
        $e = ($a AND $c);
        $f = ($a XOR $b);

        var_dump($a, $b, $c, $d, $e, $f);

        echo '<br><br>'.var_export($c, true).'<br>';  
        echo var_export($e, true).'<br>';  

        unset($a, $b, $c, $d, $e, $f);
        echo '<hr>';
        //-------------------------------Ejercicio7---------------------------------
        echo '<h2>Ejercicio 7</h2>';
        echo '<p>Usando la variable predefinida $_SERVER, determina lo siguiente:</p>';

        echo '<p>a. La versión de Apache y PHP,</p>';
        echo $_SERVER['SERVER_SOFTWARE'];
        
        echo '<p>b. El nombre del sistema operativo (servidor),</p>';
        // echo $_SERVER['SERVER_NAME'];
        echo PHP_OS;

        echo '<p>c. El idioma del navegador (cliente).</p>';
        echo $_SERVER['HTTP_ACCEPT_LANGUAGE'];
    ?>

</body>
</html>
