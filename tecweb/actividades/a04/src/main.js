function ejemplo1() {
    ddocument.write('Hola Mundo');
}

function ejemplo2() {
    var nombre = 'Juan';
    var edad = 10;
    var altura = 1.92;
    var casado = false;

    document.write(nombre);
    document.write('<br>');
    document.write(edad);
    document.write('<br>');
    document.write(altura);
    document.write('<br>');
    document.write(casado);
}

function ejemplo3() {
    var nombre;
    var edad;

    nombre = prompt('Ingresa tu nombre:', '');
    edad = prompt('Ingresa tu edad:', '');
    document.write('Hola ');
    document.write(nombre);
    document.write(' así que tienes ');
    document.write(edad);
    document.write(' años');
}

