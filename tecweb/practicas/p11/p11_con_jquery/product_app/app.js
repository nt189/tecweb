// JSON BASE A MOSTRAR EN FORMULARIO
var baseJSON = {
    "precio": 0.0,
    "unidades": 1,
    "modelo": "XX-000",
    "marca": "NA",
    "detalles": "NA",
    "imagen": "img/default.png"
  };

function init() {
    /**
     * Convierte el JSON a string para poder mostrarlo
     * ver: https://developer.mozilla.org/es/docs/Web/JavaScript/Reference/Global_Objects/JSON
     */
    var JsonString = JSON.stringify(baseJSON,null,2);
    document.getElementById("description").value = JsonString;

    // SE LISTAN TODOS LOS PRODUCTOS
    // listarProductos();
}

$(document).ready(function() {
    console.log('jquery is working!');
    fetchproducts();
    $('#product-result').hide();


    // Buscar productos
    $('#search').keyup(function() {
        if($('#search').val()) {
        let search = $('#search').val();
        $.ajax({
        url: 'backend/product-search.php',
        data: {search},
        type: 'POST',
        success: function (response) {
            if(!response.error) {
                let products = JSON.parse(response);
                let template = '';
                
                products.forEach(product => {
                    template += `
                        <li>${product.nombre}</li>
                        `
                });
                $('#product-result').show();
                $('#container').html(template);
            }
        } 
        })
    }
    });

        // Mostrar productos
    function fetchproducts() {
        $.ajax({
        url: 'backend/product-list.php',
        type: 'GET',
        success: function(response) {
            const products = JSON.parse(response);
            let template = '';
            products.forEach(product => {
                let descripcion = '';
                descripcion += '<li>precio: '+product.precio+'</li>';
                descripcion += '<li>unidades: '+product.unidades+'</li>';
                descripcion += '<li>modelo: '+product.modelo+'</li>';
                descripcion += '<li>marca: '+product.marca+'</li>';
                descripcion += '<li>detalles: '+product.detalles+'</li>';
            
                template += `
                    <tr productId="${product.id}">
                        <td>${product.id}</td>
                        <td>${product.nombre}</td>
                        <td><ul>${descripcion}</ul></td>
                        <td>
                            <button class="product-delete btn btn-danger" onclick="eliminarProducto()">
                                Eliminar
                            </button>
                        </td>
                    </tr>
                `;
            });
            $('#products').html(template);
        }
        });
    }

    // Agregar productos
    $('#product-form').submit(function (e) {
        // SE OBTIENE DESDE EL FORMULARIO EL JSON A ENVIAR
        var productoJsonString = document.getElementById('description').value;
        // SE CONVIERTE EL JSON DE STRING A OBJETO
        var finalJSON = JSON.parse(productoJsonString);
        // SE AGREGA AL JSON EL NOMBRE DEL PRODUCTO
        finalJSON['nombre'] = document.getElementById('name').value;
        // SE OBTIENE EL STRING DEL JSON FINAL
        productoJsonString = JSON.stringify(finalJSON,null,2);

        $.post('backend/product-add.php', productoJsonString, function (response) {
            console.log(response);
            
            if(!response.error) {
                let result = JSON.parse(response);
                let template = `
                        <li style="list-style: none;">status: ${result.status}</li>
                        <li style="list-style: none;">message: ${result.message}</li>
                    `;

                $('#product-result').show();
                $('#container').html(template);
            }
        });
        e.preventDefault();
    });
});