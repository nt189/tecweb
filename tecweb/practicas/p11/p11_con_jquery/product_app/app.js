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
    // Global Settings
    let edit = false;

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
                            <td>
                            <a href="#" class="product-item">${product.nombre}</a>
                            </td>
                            <td><ul>${descripcion}</ul></td>
                            <td>
                                <button class="product-delete btn btn-danger">
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
        $('#product-form').submit(e => {
            e.preventDefault();
            let description = JSON.parse($('#description').val());
            const postData = {
                nombre: $('#name').val(),
                marca:  description.marca,
                modelo: description.modelo,
                precio: description.precio,
                detalles: description.detalles,
                unidades: description.unidades,
                imagen:   description.imagen,
                id: $('#productId').val()
            };
            
            const url = edit === false ? 'backend/product-add.php' : 'backend/product-edit.php';
            // console.log(postData, url);
            $.post(url, JSON.stringify(postData), (response) => {
                console.log(response);

                if(!response.error) {
                    let result = JSON.parse(response);
                    // console.log(result.status)
                    let template = `
                            <li style="list-style: none;">status: ${result.status}</li>
                            <li style="list-style: none;">message: ${result.message}</li>
                        `;
                    $('#product-result').show();
                    $('#container').html(template);
                }
                init();
                fetchproducts();
            });
        });

        // Elimiar producto
        $(document).on('click', '.product-delete', (e) => {
            if(confirm('De verdad deseas eliinar el Producto')) {
            const element = $(this)[0].activeElement.parentElement.parentElement;
            const id = $(element).attr('productId');
            $.post('backend/product-delete.php', {id}, (response) => {
                fetchproducts();
                console.log(response)

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
            }
        });

        // identificador de producto
        $(document).on('click', '.product-item', (e) => {
            const element = $(this)[0].activeElement.parentElement.parentElement;
            const id = $(element).attr('productId');
            $.post('backend/product-single.php', {id}, (response) => {
                const product = JSON.parse(response);
                $('#name').val(product[0].nombre);

                let template = `{
"precio": ${product[0].precio},
"unidades": ${product[0].unidades},
"modelo": "${product[0].modelo}",
"marca": "${product[0].marca}",
"detalles": "${product[0].detalles}",
"imagen": "${product[0].imagen}"
}`; 

                $('#description').val(template);
                $('#productId').val(product[0].id);
                edit = true;
            });
            e.preventDefault();
        });
    });
});