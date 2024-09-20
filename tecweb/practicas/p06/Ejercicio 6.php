<?php
    header('Content-Type: application/xhtml+xml'); // Establece el tipo de contenido como XHTML
    echo '<?xml version="1.0" encoding="UTF-8"?>'; // Prolog XML
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
    <html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
        <head>
            <meta http-equiv="Content-Type" content="application/xhtml+xml; charset=UTF-8" />
            <title>Ejemplo de XHTML con PHP</title>
        </head>
        <body>
            <h2>Ejercicio 5 Resultado</h2>
            <?php 
                $registros = Array(
                    'UBN6338' => Array(
                        'Auto' => Array(
                            'marca' => 'Honda',
                            'modelo' => '2020',
                            'tipo' => 'Camioneta'
                        ),
                        'Propietario' => Array(
                            'nombre' => 'Alfonzo Esparza',
                            'ciudad' => 'Puebla, Pue.',
                            'direccion' => 'C.U., Jardines de San Manuel'
                        )
                    ),
                    'UBN6339' => array(
                        'Auto' => array(
                            'marca' => 'Mazda',
                            'modelo' => '2019',
                            'tipo' => 'sedan'
                        ),
                        'Propietario' => array(
                            'nombre' => 'Ma. del Consuelo Molina',
                            'ciudad' => 'Puebla, Pue.',
                            'direccion' => '97 oriente'
                        )
                    ),
                    'BLY3812' => array(
                        'Auto' => array(
                            'marca' => 'Hyundai',
                            'modelo' => '2018',
                            'tipo' => 'Minivan'
                        ),
                        'Propietario' => array(
                            'nombre' => 'Carlos Garcia',
                            'ciudad' => 'Saltillo',
                            'direccion' => 'Plaza Central 34'
                        )
                    ),
                    'EOW6810' => array(
                        'Auto' => array(
                            'marca' => 'Volkswagen',
                            'modelo' => '2019',
                            'tipo' => 'Sedán'
                        ),
                        'Propietario' => array(
                            'nombre' => 'Jose Hernandez',
                            'ciudad' => 'Mérida',
                            'direccion' => 'Calle Larga 12'
                        )
                    ),
                    'DVT1335' => array(
                        'Auto' => array(
                            'marca' => 'Hyundai',
                            'modelo' => '2020',
                            'tipo' => 'Hatchback'
                        ),
                        'Propietario' => array(
                            'nombre' => 'Lucia Gonzalez',
                            'ciudad' => 'Chihuahua',
                            'direccion' => 'Calle Real 7'
                        )
                    ),
                    'MVH7099' => array(
                        'Auto' => array(
                            'marca' => 'BMW',
                            'modelo' => '2016',
                            'tipo' => 'Minivan'
                        ),
                        'Propietario' => array(
                            'nombre' => 'Ana Ramirez',
                            'ciudad' => 'Monterrey',
                            'direccion' => 'Plaza Central 34'
                        )
                    ),
                    'TJW8795' => array(
                        'Auto' => array(
                            'marca' => 'Toyota',
                            'modelo' => '2018',
                            'tipo' => 'Sedán'
                        ),
                        'Propietario' => array(
                            'nombre' => 'Felipe Torres',
                            'ciudad' => 'Cancún',
                            'direccion' => 'Boulevard Norte 21'
                        )
                    ),
                    'QNW0316' => array(
                        'Auto' => array(
                            'marca' => 'Ford',
                            'modelo' => '2022',
                            'tipo' => 'Hatchback'
                        ),
                        'Propietario' => array(
                            'nombre' => 'Fernanda Suarez',
                            'ciudad' => 'Monterrey',
                            'direccion' => 'Callejón 78'
                        )
                    ),
                    'MZM8462' => array(
                        'Auto' => array(
                            'marca' => 'Renault',
                            'modelo' => '2014',
                            'tipo' => 'Sedán'
                        ),
                        'Propietario' => array(
                            'nombre' => 'Jose Hernandez',
                            'ciudad' => 'Mérida',
                            'direccion' => 'Calle 3A'
                        )
                    ),
                    'BFF9052' => array(
                        'Auto' => array(
                            'marca' => 'Honda',
                            'modelo' => '2023',
                            'tipo' => 'Camioneta'
                        ),
                        'Propietario' => array(
                            'nombre' => 'Maria Lopez',
                            'ciudad' => 'Monterrey',
                            'direccion' => 'Avenida Principal 45'
                        )
                    ),
                    'OGJ2286' => array(
                        'Auto' => array(
                            'marca' => 'Renault',
                            'modelo' => '2017',
                            'tipo' => 'Deportivo'
                        ),
                        'Propietario' => array(
                            'nombre' => 'Jose Hernandez',
                            'ciudad' => 'Guadalajara',
                            'direccion' => 'Carretera 56'
                        )
                    ),
                    'PYO2115' => array(
                        'Auto' => array(
                            'marca' => 'Renault',
                            'modelo' => '2018',
                            'tipo' => 'Minivan'
                        ),
                        'Propietario' => array(
                            'nombre' => 'Lucia Gonzalez',
                            'ciudad' => 'Querétaro',
                            'direccion' => 'Calle del Sol 9'
                        )
                    ),
                    'FKO2321' => array(
                        'Auto' => array(
                            'marca' => 'Honda',
                            'modelo' => '2021',
                            'tipo' => 'Minivan'
                        ),
                        'Propietario' => array(
                            'nombre' => 'Laura Diaz',
                            'ciudad' => 'San Luis Potosí',
                            'direccion' => 'Calle del Sol 9'
                        )
                    ),
                    'ACS8319' => array(
                        'Auto' => array(
                            'marca' => 'BMW',
                            'modelo' => '2020',
                            'tipo' => 'Camioneta'
                        ),
                        'Propietario' => array(
                            'nombre' => 'Sofia Martinez',
                            'ciudad' => 'San Luis Potosí',
                            'direccion' => 'Boulevard Norte 21'
                        )
                    ),
                    'JZG7789' => array(
                        'Auto' => array(
                            'marca' => 'Hyundai',
                            'modelo' => '2024',
                            'tipo' => 'Deportivo'
                        ),
                        'Propietario' => array(
                            'nombre' => 'Fernanda Suarez',
                            'ciudad' => 'Saltillo',
                            'direccion' => 'Avenida Principal 45'
                        )
                    )
                );
                // echo '<br>'. count($registros);

                if(isset($_POST["Matricula"])){
                    $matricula_buscada = 'BLY3812'; // Matrícula que deseas filtrar

                    if (isset($registros[$matricula_buscada])){
                        $detalles = $registros[$matricula_buscada];

                        echo "
                            <fieldset>
                                <ul>
                                    <li>Matrícula: $matricula_buscada</li>
                                    <li>Auto:</li>
                                    <ul>
                                        <li>Marca: {$detalles['Auto']['marca']}</li>
                                        <li>Modelo (año): {$detalles['Auto']['modelo']}</li>
                                        <li>Tipo (sedan|hatchback|camioneta): {$detalles['Auto']['tipo']}</li>
                                    </ul>
                                    <li>Propietario:</li>
                                    <ul>
                                        <li>Nombre: {$detalles['Propietario']['nombre']}</li>
                                        <li>Ciudad: {$detalles['Propietario']['ciudad']}</li>
                                        <li>Dirección: {$detalles['Propietario']['direccion']}</li>
                                    </ul>
                                </ul>
                            </fieldset>
                        ";
                    } 
                    else{
                        echo "No se encontró la matrícula: $matricula_buscada";
                    }
                }
                else if(isset($_POST["MTodos"])){
                    foreach ($registros as $matricula => $detalles){
                        echo "
                            <fieldset>
                                <legend>Carro</legend>
                                <ul>
                                    <li>Matrícula: $matricula</li>
                                    <li>Auto:</li>
                                    <ul>
                                        <li>Marca: {$detalles['Auto']['marca']}</li>
                                        <li>Modelo (año): {$detalles['Auto']['modelo']}</li>
                                        <li>Tipo (sedan|hatchback|camioneta): {$detalles['Auto']['tipo']}</li>
                                    </ul>
                                    <li>Propietario:</li>
                                    <ul>
                                        <li>Nombre: {$detalles['Propietario']['nombre']}</li>
                                        <li>Ciudad: {$detalles['Propietario']['ciudad']}</li>
                                        <li>Dirección: {$detalles['Propietario']['direccion']}</li>
                                    </ul>
                                </ul>
                            </fieldset>
                        ";
                    };
                }
            ?>
        </body>
    </html>
