-- procedimiento para insertar clientes
DELIMITER // 
CREATE PROCEDURE insert_clientes(
    IN _cli_nombre varchar(100),
       _tcl_id int(2) UNSIGNED,
       _loc_id int(3) UNSIGNED
)
BEGIN
INSERT INTO clientes (cli_nombre, loc_id, tcl_id) VALUES (_cli_nombre, _loc_id, _tcl_id);
END;
// DELIMITER  ;

-- procedimiento para insertar localidades
DELIMITER // 
CREATE PROCEDURE insert_localidades( IN _loc_nombre varchar(255) ) BEGIN INSERT INTO localidades ( loc_nombre) VALUES ( _loc_nombre); END;
// DELIMITER  ;

-- procedimiento para insertar tipos de cliente
DELIMITER // 
CREATE PROCEDURE insert_tipos_cliente( IN _tcl_nombre varchar(255) ) BEGIN INSERT INTO tipos_cliente ( tcl_nombre) VALUES ( _tcl_nombre); END;
// DELIMITER  ;

-- procedimiento para listar los clientes
DELIMITER // 
CREATE PROCEDURE get_clientes() BEGIN
SELECT * FROM clientes; 
END;
// DELIMITER  ;

-- procedimiento para listar las localidades
DELIMITER // 
CREATE PROCEDURE get_localidades() BEGIN
SELECT * FROM localidades; 
END;
// DELIMITER  ;

-- procedimiento para listar los tipos de cliente
DELIMITER // 
CREATE PROCEDURE get_tipos_cliente() BEGIN
SELECT * FROM tipos_cliente; 
END;
// DELIMITER  ;

-- procedimiento para listar toda la info enlazada
DELIMITER // 
CREATE PROCEDURE get_full_data() BEGIN
SELECT 
	clientes.cli_id,clientes.cli_nombre,clientes.loc_id,clientes.tcl_id,tipos_cliente.tcl_nombre,localidades.loc_nombre 
FROM clientes 
	JOIN tipos_cliente ON clientes.tcl_id=tipos_cliente.tcl_id 
    JOIN localidades ON clientes.loc_id=localidades.loc_id;
END;
// DELIMITER  ;