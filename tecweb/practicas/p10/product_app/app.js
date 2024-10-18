// JSON BASE A MOSTRAR EN FORMULARIO
var baseJSON = {
    "precio": 0.0,
    "unidades": 1,
    "modelo": "XX-000",
    "marca": "NA",
    "detalles": "NA",
    "imagen": "img/default.png"
  };

// FUNCIÓN CALLBACK DE BOTÓN "Buscar"
function buscarID(e) {
    /**
     * Revisar la siguiente información para entender porqué usar event.preventDefault();
     * http://qbit.com.mx/blog/2013/01/07/la-diferencia-entre-return-false-preventdefault-y-stoppropagation-en-jquery/#:~:text=PreventDefault()%20se%20utiliza%20para,escuche%20a%20trav%C3%A9s%20del%20DOM
     * https://www.geeksforgeeks.org/when-to-use-preventdefault-vs-return-false-in-javascript/
     */
    e.preventDefault();

    // SE OBTIENE EL ID A BUSCAR
    var id = document.getElementById('search').value;

    // SE CREA EL OBJETO DE CONEXIÓN ASÍNCRONA AL SERVIDOR
    var client = getXMLHttpRequest();
    client.open('POST', './backend/read.php', true);
    client.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    client.onreadystatechange = function () {
        // SE VERIFICA SI LA RESPUESTA ESTÁ LISTA Y FUE SATISFACTORIA
        if (client.readyState == 4 && client.status == 200) {
            console.log('[CLIENTE]\n'+client.responseText);
            
            // SE OBTIENE EL OBJETO DE DATOS A PARTIR DE UN STRING JSON
            let productos = JSON.parse(client.responseText);    // similar a eval('('+client.responseText+')');
            
            // SE VERIFICA SI EL OBJETO JSON TIENE DATOS
            if(Object.keys(productos).length > 0) {
                // SE CREA UNA LISTA HTML CON LA DESCRIPCIÓN DEL PRODUCTO
                let descripcion = '';
                    descripcion += '<li>precio: '+productos.precio+'</li>';
                    descripcion += '<li>unidades: '+productos.unidades+'</li>';
                    descripcion += '<li>modelo: '+productos.modelo+'</li>';
                    descripcion += '<li>marca: '+productos.marca+'</li>';
                    descripcion += '<li>detalles: '+productos.detalles+'</li>';
                
                // SE CREA UNA PLANTILLA PARA CREAR LA(S) FILA(S) A INSERTAR EN EL DOCUMENTO HTML
                let template = '';
                    template += `
                        <tr>
                            <td>${productos.id}</td>
                            <td>${productos.nombre}</td>
                            <td><ul>${descripcion}</ul></td>
                        </tr>
                    `;

                // SE INSERTA LA PLANTILLA EN EL ELEMENTO CON ID "productos"
                document.getElementById("productos").innerHTML = template;
            }
        }
    };
    client.send("id="+id);
}

//Validador
function Validado(producto){
    var nombre = producto.nombre;
    var marca = producto.marca;
    var modelo = producto.modelo;
    var precio = parseFloat(producto.precio);
    var detalles = producto.detalles;
    var unidades = parseInt(producto.unidades);
    var imagen = producto.imagen;

    // El nombre debe ser requerido y tener 100 caracteres o menos.
    if (!nombre || nombre.length > 100) {
        alert("El nombre es requerido y debe tener 100 caracteres o menos.");
        return false;
    }

    // La marca debe ser requerida y seleccionarse de una lista de opciones.
    if (marca == 'NA') {
        alert("La marca es requerida y debe seleccionarse de una lista de opciones.");
        return false;
    }

    // El modelo debe ser requerido, texto alfanumérico y tener 25 caracteres o menos.
    if (modelo == 'XX-000' || modelo.length > 25 || !/^[a-zA-Z0-9]+$/.test(modelo)) {
        alert("El modelo es requerido, debe ser alfanumérico y tener 25 caracteres o menos.");
        return false;
    }

    // El precio debe ser requerido y debe ser mayor a 99.99.
    if (precio == 0 || precio <= 99.99) {
        alert("El precio es requerido y debe ser mayor a 99.99.");
        return false;
    }

    // Los detalles deben ser opcionales y, de usarse, deben tener 250 caracteres o menos.
    if (detalles.length > 250) {
        alert("Los detalles, si se proporcionan, deben tener 250 caracteres o menos.");
        return false;
    }

    // Las unidades deben ser requeridas y el número registrado debe ser mayor o igual a O.
    if (isNaN(unidades) || unidades < 0) {
        alert("Las unidades son requeridas y deben ser mayor o igual a 0.");
        return false;
    }

    // La ruta de la imagen debe ser opcional, pero en caso de no registrarse se debe usar la
    // ruta de una imagen por defecto. El siguiente es un ejemplo de una posible imagen por
    // defecto
    return true;
}

// FUNCIÓN CALLBACK DE BOTÓN "Agregar Producto"
function agregarProducto(e) {
    e.preventDefault();

    // SE OBTIENE DESDE EL FORMULARIO EL JSON A ENVIAR
    var productoJsonString = document.getElementById('description').value;
    // SE CONVIERTE EL JSON DE STRING A OBJETO
    var finalJSON = JSON.parse(productoJsonString);
    // SE AGREGA AL JSON EL NOMBRE DEL PRODUCTO
    finalJSON['nombre'] = document.getElementById('name').value;
    // SE OBTIENE EL STRING DEL JSON FINAL
    productoJsonString = JSON.stringify(finalJSON,null,2);

    if(Validado(JSON.parse(productoJsonString))){
        // SE CREA EL OBJETO DE CONEXIÓN ASÍNCRONA AL SERVIDOR
        var client = getXMLHttpRequest();
        client.open('POST', './backend/create.php', true);
        client.setRequestHeader('Content-Type', "application/json;charset=UTF-8");
        client.onreadystatechange = function () {
            // SE VERIFICA SI LA RESPUESTA ESTÁ LISTA Y FUE SATISFACTORIA
            if (client.readyState == 4 && client.status == 200) {
                console.log(client.responseText)
            }
            var mensaje = client.responseText;
            window.alert(mensaje);
        };
        client.send(productoJsonString);
    }
}

// SE CREA EL OBJETO DE CONEXIÓN COMPATIBLE CON EL NAVEGADOR
function getXMLHttpRequest() {
    var objetoAjax;

    try{
        objetoAjax = new XMLHttpRequest();
    }catch(err1){
        /**
         * NOTA: Las siguientes formas de crear el objeto ya son obsoletas
         *       pero se comparten por motivos historico-académicos.
         */
        try{
            // IE7 y IE8
            objetoAjax = new ActiveXObject("Msxml2.XMLHTTP");
        }catch(err2){
            try{
                // IE5 y IE6
                objetoAjax = new ActiveXObject("Microsoft.XMLHTTP");
            }catch(err3){
                objetoAjax = false;
            }
        }
    }
    return objetoAjax;
}

function init() {
    /**
     * Convierte el JSON a string para poder mostrarlo
     * ver: https://developer.mozilla.org/es/docs/Web/JavaScript/Reference/Global_Objects/JSON
     */
    var JsonString = JSON.stringify(baseJSON,null,2);
    document.getElementById("description").value = JsonString;
}

// FUNCIÓN CALLBACK DE BOTÓN "Buscar Producto"
function buscarProducto(e) {
    e.preventDefault(); // Evita el comportamiento predeterminado del formulario

    // Obtiene el término de búsqueda
    var id = document.getElementById('buscar').value;

    // Verifica que el término no esté vacío
    if (!id) {
        console.error('El término de búsqueda no puede estar vacío');
        return;
    }

    // Crea el objeto de conexión asíncrona al servidor
    var client = getXMLHttpRequest();
    client.open('POST', './backend/read.php', true);
    client.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

    client.onreadystatechange = function () {
        if (client.readyState == 4) {
            if (client.status == 200) {
                console.log('[CLIENTE]\n' + client.responseText);
                // Procesa la respuesta
                let productos = JSON.parse(client.responseText);
                
                // Verifica si hay productos y los muestra
                if (productos.length > 0) {
                    let template = '';
                    productos.forEach(producto => {
                        let descripcion = `
                            <ul>
                                <li>Precio: ${producto.precio}</li>
                                <li>Unidades: ${producto.unidades}</li>
                                <li>Modelo: ${producto.modelo}</li>
                                <li>Marca: ${producto.marca}</li>
                                <li>Detalles: ${producto.detalles}</li>
                            </ul>
                        `;

                        template += `
                            <tr>
                                <td>${producto.id}</td>
                                <td>${producto.nombre}</td>
                                <td>${descripcion}</td>
                            </tr>
                        `;
                    });
                    // Inserta la plantilla en el elemento con ID "productos"
                    document.getElementById("productos").innerHTML = template;
                } else {
                    console.log('No se encontraron productos.');
                }
            } else {
                console.error('Error en la solicitud: ', client.status, client.statusText);
            }
        }
    };

    // Envía el término de búsqueda al servidor
    client.send("id=" + encodeURIComponent(id));
}