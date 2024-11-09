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
        return false;
    }
}
function borrador(){
    document.getElementById('msnombre').innerHTML = '';
    document.getElementById('msmarca').innerHTML = '';
    document.getElementById('msmodelo').innerHTML = '';
    document.getElementById('msprecio').innerHTML = '';
    document.getElementById('msdetalles').innerHTML = '';
    document.getElementById('msunidades').innerHTML = '';
    document.getElementById('msimagen').innerHTML = '';
}

function validador(){
    var nombre = document.getElementById('nombre').value;
    var marca = document.getElementById('marca').value;
    var modelo = document.getElementById('modelo').value;
    var precio = document.getElementById('precio').value;
    var detalles = document.getElementById('detalles').value;
    var unidades = document.getElementById('unidades').value;
    var imagen = document.getElementById('imagen').value;
    var val = 5;

    // borrador();
    
    // El nombre debe ser requerido y tener 100 caracteres o menos.
    if(campvacio(nombre)){
        val--;
    }
    else if(!enrango(nombre, 1, 100)){
        val--;
    }

    // La marca debe ser requerida y seleccionarse de una lista de opciones.
    const marcasPermitidas = ["Iphone", "Samsung", "Xiaomi", "Realme", "Motorola", "Poco"];
    if(campvacio(marca)){
        val--;
    }
    else if(!marcasPermitidas.includes(marca)){
        val--;
    }

    // El modelo debe ser requerido, texto alfanumérico y tener 25 caracteres o menos.
    var modeloRegex = /^[A-Za-z0-9]+$/;
    if(campvacio(modelo)){
        val--;
    }
    else if(!enrango(modelo, 1, 25)){
        val--;
    }
    else if(!modeloRegex.test(modelo)){
        val--;
    }


    // El precio debe ser requerido y debe ser mayor a 99.99.
    if(campvacio(precio)){
        val--;
    }
    else if(parseFloat(precio) <= 99.99){
        val--;
    }

    // Los detalles deben ser opcionales y, de usarse, deben tener 250 caracteres o menos.
    if(detalles.length == 0){

    }
    else if(!enrango(detalles, 0, 250)){
        val--;
    }

    // Las unidades deben ser requeridas y el número registrado debe ser mayor o igual a O.
    if(campvacio(unidades)){
        val--;
    }
    else if(parseInt(unidades) < 0){
        val--;
    }
    
    // La ruta de la imagen debe ser opcional, pero en caso de no registrarse se debe usar la
    // ruta de una imagen por defecto. El siguiente es un ejemplo de una posible imagen por
    // defecto
    
    console.log(val)
    if(val == 5){
        return true;
    }
}