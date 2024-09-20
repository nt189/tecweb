<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Práctica 6</title>
</head>
<body>
    <h2>Ejercicio 1</h2>
    <p>Escribir programa para comprobar si un número es un múltiplo de 5 y 7</p>
    <?php 
        include("src/Funciones.php");
        Ejercicio1();
    ?>

    <!--  -->
    <h2>Ejercicio 2</h2>
    <p>Crea un programa para la generación repetitiva de 3 números aleatorios hasta obtener una <br>
        secuencia compuesta por:impar, par, impar</p>
    <?php 
        Ejercicio2();
    ?>
    <h2>Ejercicio 3</h2>
    <p>Utiliza un ciclo while para encontrar el primer número entero obtenido aleatoriamente,<br>
    pero que además sea múltiplo de un número dado.</p>
    <?php 
        Ejercicio3();
    ?>

    <!--  -->
    <h2>Ejercicio 4</h2>
    <p>Crear un arreglo cuyos índices van de 97 a 122 y cuyos valores son las letras de la ‘a’ <br>
    a la ‘z’. Usa la función chr(n) que devuelve el caracter cuyo código ASCII es n para poner <br>
    el valor en cada índice.</p>
    <?php
        Ejercicio4();
    ?>
</body>
</html>