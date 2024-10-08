function ejemplo1() {
    document.getElementById('ejemplo1').innerHTML += 'Hola Mundo';
}

function ejemplo2() {
    var nombre = 'Juan';
    var edad = 10;
    var altura = 1.92;
    var casado = false;

    document.getElementById('ejemplo2').innerHTML += nombre;
    document.getElementById('ejemplo2').innerHTML += '<br>';
    document.getElementById('ejemplo2').innerHTML += edad;
    document.getElementById('ejemplo2').innerHTML += '<br>';
    document.getElementById('ejemplo2').innerHTML += altura;
    document.getElementById('ejemplo2').innerHTML += '<br>';
    document.getElementById('ejemplo2').innerHTML += casado;
}

function ejemplo3() {
    var nombre;
    var edad;

    nombre = prompt('Ingresa tu nombre:', '');
    edad = prompt('Ingresa tu edad:', '');
    document.getElementById('ejemplo3').innerHTML += 'Hola ';
    document.getElementById('ejemplo3').innerHTML += nombre;
    document.getElementById('ejemplo3').innerHTML += ' así que tienes ';
    document.getElementById('ejemplo3').innerHTML += edad;
    document.getElementById('ejemplo3').innerHTML += ' años';
}

function ejemplo4() {
    var valor1;
    var valor2;

    valor1 = prompt('Introducir primer número:', '');
    valor2 = prompt('Introducir segundo número', '');

    var suma = parseInt(valor1) + parseInt(valor2);
    var producto = parseInt(valor1) * parseInt(valor2);

    document.getElementById('ejemplo4').innerHTML += 'La suma es ';
    document.getElementById('ejemplo4').innerHTML += suma;
    document.getElementById('ejemplo4').innerHTML += '<br>';
    document.getElementById('ejemplo4').innerHTML += 'El producto es ';
    document.getElementById('ejemplo4').innerHTML += producto;
}

function ejemplo5() {
    var nombre;
    var nota;

    nombre = prompt('Ingresa tu nombre:', '');
    nota = prompt('Ingresa tu nota:', '');

    if (nota >= 4) {
        document.getElementById('ejemplo5').innerHTML += nombre + ' esta aprobado con un ' + nota;
    }
}

function ejemplo6() {
    var num1, num2;
    num1 = prompt('Ingresa el primer número:', '');
    num2 = prompt('Ingresa el segundo número:', '');
    num1 = parseInt(num1);
    num2 = parseInt(num2);
    if (num1 > num2) {
        document.getElementById('ejemplo6').innerHTML += 'el mayor es ' + num1;
    }
    else {
        document.getElementById('ejemplo6').innerHTML += 'el mayor es ' + num2;
    }
}

function ejemplo7() {
    var nota1, nota2, nota3;

    nota1 = prompt('Ingresa 1ra. nota:', '');
    nota2 = prompt('Ingresa 2da. nota:', '');
    nota3 = prompt('Ingresa 3ra. nota:', '');

    //Convertimos los 3 string en enteros
    nota1 = parseInt(nota1);
    nota2 = parseInt(nota2);
    nota3 = parseInt(nota3);

    var pro;
    pro = (nota1 + nota2 + nota3) / 3;

    if (pro>=7) {
            document.getElementById('ejemplo7').innerHTML += 'aprobado';
        }
        else {
        if (pro>=4) {
            document.getElementById('ejemplo7').innerHTML += 'regular';
        }
        else {
            document.getElementById('ejemplo7').innerHTML += 'reprobado';
        }
    }
}

function ejemplo8(){
    var valor;
    valor = prompt('Ingresar un valor comprendido entre 1 y 5:', '' );
    //Convertimos a entero
    valor = parseInt(valor);
    switch (valor) {
        case 1: document.getElementById('ejemplo8').innerHTML += 'uno';
            break;
        case 2: document.getElementById('ejemplo8').innerHTML += 'dos';
            break;
        case 3: document.getElementById('ejemplo8').innerHTML += 'tres';
            break;
        case 4: document.getElementById('ejemplo8').innerHTML += 'cuatro';
            break;
        case 5: document.getElementById('ejemplo8').innerHTML += 'cinco';
            break;
        default:document.getElementById('ejemplo8').innerHTML += 'debe ingresar un valor comprendido entre 1 y 5.';
    }
}

function ejemplo9(){
    var col;
    col = prompt('Ingresa el color con que quierar pintar el fondo de la ventana (rojo, verde, azul)' , '' );
    switch (col) {
    case 'rojo': document.bgColor='#ff0000';
        break;

    case 'verde': document.bgColor='#00ff00';
        break;

    case 'azul': document.bgColor='#0000ff';
        break;
    }
}

function ejemplo10(){
    var x;
    x=1;
        while (x<=100) {
        document.getElementById('ejemplo10').innerHTML += x;
        document.getElementById('ejemplo10').innerHTML += '<br>';
        x=x+1;
    }
}

function ejemplo11(){
    var x=1;
    var suma=0;
    var valor;
    while (x<=5){
        valor = prompt('Ingresa el valor:', '');
        valor = parseInt(valor);
        suma = suma+valor;
        x = x+1;
    }
    document.getElementById('ejemplo11').innerHTML += "La suma de los valores es "+suma+"<br>";
}

function ejemplo12(){ //
    var valor;
    do{
        valor = prompt('Ingresa un valor entre 0 y 999:', '');
        valor = parseInt(valor);
        document.getElementById('ejemplo12').innerHTML += 'El valor '+valor+' tiene ';
        if (valor<10)
            document.getElementById('ejemplo12').innerHTML += 'Tiene 1 dígitos';
        else
        if (valor<100) {
            document.getElementById('ejemplo12').innerHTML += 'Tiene 2 dígitos';
        }
        else {
            document.getElementById('ejemplo12').innerHTML += 'Tiene 3 dígitos';
        }
        document.getElementById('ejemplo12').innerHTML += '<br>';
    }while(valor!=0);
}

function ejemplo13(){
    var f;
    for(f=1; f<=10; f++)
    {
        document.getElementById('ejemplo13').innerHTML += f+" ";
    }
}

function ejemplo14(){
    document.getElementById('ejemplo14').innerHTML += "Cuidado<br>";
    document.getElementById('ejemplo14').innerHTML += "Ingresa tu dcumento correctamente<br>";
    document.getElementById('ejemplo14').innerHTML += "Cuidado<br>";
    document.getElementById('ejemplo14').innerHTML += "Ingresa tu documento correctamente<br>";
    document.getElementById('ejemplo14').innerHTML += "Cuidado<br>";
    document.getElementById('ejemplo14').innerHTML += "Ingresa tu documento correctamente<br>";
}

function ejemplo15(){
    function mostrarMensaje() {
            document.getElementById('ejemplo15').innerHTML += "Cuidado<br>";
            document.getElementById('ejemplo15').innerHTML += "Ingresa tu documento correctamente<br>";
        }

    mostrarMensaje();
    mostrarMensaje();
    mostrarMensaje();
}

function ejemplo16(){
    function mostrarRango(x1,x2) {
        var inicio;

        for(inicio=x1; inicio<=x2; inicio++) {
            document.getElementById('ejemplo16').innerHTML += inicio+' ';
        }
    }

    var valor1,valor2;
    valor1 = prompt('Ingresa el valor inferior:', '');
    valor1 = parseInt(valor1);
    valor2 = prompt('Ingresa el valor superior:', '');
    valor2 = parseInt(valor2);
    mostrarRango(valor1,valor2);
}

function ejemplo17(){
    function convertirCastellano(x) {
        if(x==1)
            return "uno";
        else
        if(x==2)
            return "dos";
        else
        if(x==3)
            return "tres";
        else
        if(x==4)
            return "cuatro";
        else
        if(x==5)
            return "cinco";
        else
            return "valor incorrecto";
        }

    var valor = prompt("Ingresa un valor entre 1 y 5", "");
    valor = parseInt(valor);
    var r = convertirCastellano(valor);
    document.getElementById('ejemplo17').innerHTML += r;
}

function ejemplo18(){
    function convertirCastellano(x) {
        switch (x) {
            case 1: return "uno";
            case 2: return "dos";
            case 3: return "tres";
            case 4: return "cuatro";
            case 5: return "cinco";
            default: return "valor incorrecto";
        }
    }

    var valor = prompt("Ingresa un valor entre 1 y 5", "");
    valor = parseInt(valor);
    var r = convertirCastellano(valor);
    document.getElementById('ejemplo18').innerHTML += r;
}