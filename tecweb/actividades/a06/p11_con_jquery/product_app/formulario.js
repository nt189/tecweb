window.onload = function() {
    borrador();
};


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

    document.getElementById('msnombre').style.display = 'none';
    document.getElementById('msmarca').style.display = 'none';
    document.getElementById('msmodelo').style.display = 'none';
    document.getElementById('msprecio').style.display = 'none';
    document.getElementById('msdetalles').style.display = 'none';
    document.getElementById('msunidades').style.display = 'none';
    document.getElementById('msimagen').style.display = 'none';
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

    borrador();
    
        // El nombre debe ser requerido y tener 100 caracteres o menos.
        if(campvacio(nombre)){
            document.getElementById('msnombre').innerHTML = 'Por favor rellene el campo ';
            val--;
        }
        else if(!enrango(nombre, 1, 100)){
            document.getElementById('msnombre').innerHTML = 'El nombre tiene: ' + nombre.length + ' caracteres por favor ingrese como maximo 100';
            val--;
        }
    
        // La marca debe ser requerida y seleccionarse de una lista de opciones.
        const marcasPermitidas = ["Iphone", "Samsung", "Xiaomi", "Realme", "Motorola", "Poco"];
        if(campvacio(marca)){
            document.getElementById('msmarca').innerHTML = 'Por favor ingrese una marca valida: Iphone, Samsung, Xiaomi, Realme, Motorola, Poco';
            val--;
        }
        else if(!marcasPermitidas.includes(marca)){
            document.getElementById('msmarca').innerHTML = 'Por favor ingrese una marca valida: Iphone, Samsung, Xiaomi, Realme, Motorola, Poco"';
            val--;
        }
    
        // El modelo debe ser requerido, texto alfanumérico y tener 25 caracteres o menos.
        var modeloRegex = /^[A-Za-z0-9]+$/;
        if(campvacio(modelo)){
            document.getElementById('msmodelo').innerHTML = 'Por favor rellene el campo';
            val--;
        }
        else if(!enrango(modelo, 1, 25)){
            document.getElementById('msmodelo').innerHTML = 'El modelo tiene: ' + modelo.length + ' caracteres por favor ingrese como maximo 25';
            val--;
        }
        else if(!modeloRegex.test(modelo)){
            document.getElementById('msmodelo').innerHTML = 'El modelo debe ser alfanumerico';
            val--;
        }
    
    
        // El precio debe ser requerido y debe ser mayor a 99.99.
        if(campvacio(precio)){
            document.getElementById('msprecio').innerHTML = 'Por favor rellene el campo';
            val--;
        }
        else if(parseFloat(precio) <= 99.99){
            document.getElementById('msprecio').innerHTML = 'El precio es debe ser mayor a 99.99';
            val--;
        }
    
        // Los detalles deben ser opcionales y, de usarse, deben tener 250 caracteres o menos.
        if(detalles.length == 0){
    
        }
        else if(!enrango(detalles, 0, 250)){
            document.getElementById('msdetalles').innerHTML = 'Los detalles tienen: ' + detalles.length + ' caracteres por favor ingrese como maximo 250';
            val--;
        }
    
        // Las unidades deben ser requeridas y el número registrado debe ser mayor o igual a O.
        if(campvacio(unidades)){
            document.getElementById('msunidades').innerHTML = 'Por favor rellene el campo';
            val--;
        }
        else if(parseInt(unidades) < 0){
            document.getElementById('msunidades').innerHTML = 'Por favor rellene el campo';
            val--;
        }
    
    // La ruta de la imagen debe ser opcional, pero en caso de no registrarse se debe usar la
    // ruta de una imagen por defecto. El siguiente es un ejemplo de una posible imagen por
    // defecto
        if(campvacio(imagen)){
            document.getElementById('msimagen').innerHTML = 'Default.png';
        }
    
    console.log(val)
    if(val == 5){
        return true;
    }
    else{
        document.getElementById('msnombre').style.display = 'inline';
        document.getElementById('msmarca').style.display = 'inline';
        document.getElementById('msmodelo').style.display = 'inline';
        document.getElementById('msprecio').style.display = 'inline';
        document.getElementById('msdetalles').style.display = 'inline';
        document.getElementById('msunidades').style.display = 'inline';
        document.getElementById('msimagen').style.display = 'inline';

        $('#product-result').show();
        
        $('#container').html(`<li>No se a podido agregar el producto</li> 
            <td>Por favor revise que los campos esten correctamente rellenados</td>`);
    }
}