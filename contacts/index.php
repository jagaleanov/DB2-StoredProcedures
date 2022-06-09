<?php
require_once('Procedures.php');

$procedures = new Procedures();
$procedures->insert_localidad('Usaquen');
$procedures->insert_localidad('Chapinero');
$procedures->insert_localidad('Santa Fe');
$procedures->insert_localidad('San Cristobal');
$procedures->insert_localidad('Suba');

$procedures->insert_tipo_cliente('Desarrollador');
$procedures->insert_tipo_cliente('Diseñador');
$procedures->insert_tipo_cliente('Otros');

$procedures->insert_cliente('Marcos Gonzalez', 1, 5);
$procedures->insert_cliente('Ingeniería y Mezclas', 2, 4);
$procedures->insert_cliente('Daniel Aguilar', 3, 3);
$procedures->insert_cliente('Abel Molina', 1, 2);

$clientes = $procedures->get_clientes();
$localidades = $procedures->get_localidades();
$tipos_cliente = $procedures->get_tipos_cliente();
$full_data = $procedures->get_full_data();
$info = $procedures->get_info();
$procedures->close_connection();
?>

<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <title>Untitled Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <h5>Info servidor</h5>
        <?php
        print "<pre> ";
        print_r($info);
        print "</pre>";
        ?>

        <h5>Tabla localidades</h5>
        <?php
        print "<pre> ";
        print_r($localidades);
        print "</pre>";
        ?>
        
        <h5>Tabla tipos cliente</h5>
        <?php
        print "<pre> ";
        print_r($tipos_cliente);
        print "</pre>";
        ?>
        
        <h5>Tabla clientes</h5>
        <?php
        print "<pre> ";
        print_r($clientes);
        print "</pre>";
        ?>
        
        <h5>Tabla con relaciones</h5>
        <?php
        print "<pre> ";
        print_r($full_data);
        print "</pre>";
        ?>
    </div>
</body>

</html>