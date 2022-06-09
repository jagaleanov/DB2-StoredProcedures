<?php
require_once('Procedures.php');

$procedures = new Procedures();
$procedures->insert_localidad('Usaquen');
$procedures->insert_localidad('Chapinero');
$procedures->insert_localidad('Santa Fe');
$procedures->insert_localidad('San Cristobal');
$procedures->insert_localidad('Usme');
$procedures->insert_localidad('Tunjuelito');
$procedures->insert_localidad('Bosa');
$procedures->insert_localidad('Kennedy');
$procedures->insert_localidad('Fontibón');
$procedures->insert_localidad('Engativá');
$procedures->insert_localidad('Suba');

$procedures->insert_tipo_cliente('Desarrollador');
$procedures->insert_tipo_cliente('Diseñador');
$procedures->insert_tipo_cliente('Otros');

$procedures->insert_cliente('Marcos Gonzalez',1,10);
$procedures->insert_cliente('Ingeniería y Mezclas',2,7);
$procedures->insert_cliente('Daniel Aguilar',3,6);
$procedures->insert_cliente('Abel Molina',1,5);

$clientes=$procedures->get_clientes();
$localidades=$procedures->get_localidades();
$tipos_cliente=$procedures->get_tipos_cliente();
$full_data=$procedures->get_full_data();

print "<pre>localidades ";print_r($localidades);print "</pre>";
print "<pre>tipos_cliente ";print_r($tipos_cliente);print "</pre>";
print "<pre>clientes ";print_r($clientes);print "</pre>";
print "<pre>all_data ";print_r($full_data);print "</pre>";
$procedures->close_connection();print "</pre>";
