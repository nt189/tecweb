// validador si el campo esta vacio
function campvacio(x){
    if(x == ""){
        return true;
    }
    else{
        return false;
    }
}
// validador si el campo requiere un rango de caracteres
function enrango(a, min, max){
    if(a.length > min && a.length<=max){
        return true;
    }
    else{
        val--;
    }
}

function validador(){
    var nombre = document.getElementById('nombre').value;
    var marca = document.getElementById('marca').value;
    var modelo = document.getElementById('modelo').value;
    var precio = document.getElementById('precio').value;
    var detalles = document.getElementById('detalles').value;
    var unidades = document.getElementById('unidades').value;
    var imagen = document.getElementById('imagen').value;
    var val = 7;
    
    // El nombre debe ser requerido y tener 100 caracteres o menos.
    if(campvacio(nombre)){
        alert('Por favor rellene el campo "Nombre del Producto"');
        val--;
    }
    else if(!enrango(nombre, 1, 100)){
        alert('El nombre tiene: ' + nombre.length + ' caracteres por favor ingrese como maximo 100');
        val--;
    }

    // La marca debe ser requerida y seleccionarse de una lista de opciones.
    const marcasPermitidas = ["Iphone", "Samsung", "Xiaomi", "Realme", "Motorola", "Poco"];
    if(campvacio(marca)){
        alert('Por favor ingrese una marca valida: Iphone, Samsung, Xiaomi, Realme, Motorola, Poco"');
        val--;
    }
    else if(marcasPermitidas.includes(marca)){
        alert('Por favor ingrese una marca valida: Iphone, Samsung, Xiaomi, Realme, Motorola, Poco"');
        val--;
    }

    // El modelo debe ser requerido, texto alfanumérico y tener 25 caracteres o menos.
    var modeloRegex = /^[A-Za-z0-9]+$/;
    if(campvacio(modelo)){
        alert('Por favor rellene el campo "Modelo"');
        val--;
    }
    else if(!enrango(modelo, 1, 25)){
        alert('El modelo tiene: ' + modelo.length + ' caracteres por favor ingrese como maximo 25');
        val--;
    }
    else if(!modeloRegex.test(modelo)){
        alert('El modelo debe ser alfanumerico');
        val--;
    }


    // El precio debe ser requerido y debe ser mayor a 99.99.
    if(campvacio(precio)){
        alert('Por favor rellene el campo "Precio"');
        val--;
    }
    else if(parseFloat(precio) <= 99.99){
        alert('El precio es debe ser mayor a 99.99');
        val--;
    }

    // Los detalles deben ser opcionales y, de usarse, deben tener 250 caracteres o menos.
    if(!enrango(detalles, 0, 250)){
        alert('Los detalles tienen: ' + nombre.length + ' caracteres por favor ingrese como maximo 250');
        val--;
    }

    // Las unidades deben ser requeridas y el número registrado debe ser mayor o igual a O.
    if(campvacio(unidades)){
        alert('Por favor rellene el campo "Unidades"');
        val--;
    }
    else if(parseInt(unidades) >= 0){
        alert('Por favor rellene el campo "Unidades"');
        val--;
    }

    // La ruta de la imagen debe ser opcional, pero en caso de no registrarse se debe usar la
    // ruta de una imagen por defecto. El siguiente es un ejemplo de una posible imagen por
    // defecto
    if(campvacio(imagen)){
        document.getElementById('imagen').innerHTML = 'img/default.png'
    }

    if(val != 7){
        event.preventDefault();
    }
}