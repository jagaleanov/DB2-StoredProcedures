<?php
require_once('Connection.php');
class Procedures
{
    private $conexion;
    public function __construct()
    {
        $mysql = new connection();
        $this->conexion = $mysql->get_connection();
    }

    public function insert_localidad(String $nombre): void
    {
        $datos = array(
            "_cli_nombre" => $nombre,
        );
        $statement = $this->conexion->prepare("CALL insert_localidades(?)");
        $statement->bind_param("s", $datos["_cli_nombre"]);
        $statement->execute();
    }

    public function insert_tipo_cliente(String $nombre): void
    {
        $datos = array("_tcl_nombre " => $nombre);
        $statement = $this->conexion->prepare("CALL insert_tipos_cliente(?)");
        $statement->bind_param("s", $datos["_tcl_nombre "]);
        $statement->execute();
    }

    public function insert_cliente(String $nombre, int $tcl_id, int $loc_id): void
    {
        $datos = array(
            "_cli_nombre" => $nombre,
            "_tcl_id" => $tcl_id,
            "_loc_id" => $loc_id,
        );
        $statement = $this->conexion->prepare("CALL insert_clientes(?,?,?)");
        $statement->bind_param("sii", $datos["_cli_nombre"], $datos["_tcl_id"], $datos["_loc_id"]);
        $statement->execute();
    }

    public function get_clientes(): array
    {
        $statement = $this->conexion->prepare("CALL get_clientes()");
        return $this->fetch($statement);
    }

    public function get_tipos_cliente(): array
    {
        $statement = $this->conexion->prepare("CALL get_tipos_cliente()");
        return $this->fetch($statement);
    }

    public function get_localidades(): array
    {
        $statement = $this->conexion->prepare("CALL get_localidades()");
        return $this->fetch($statement);
    }

    public function get_full_data(): array
    {
        $statement = $this->conexion->prepare("CALL get_full_data()");
        return $this->fetch($statement);
    }

    public function fetch($statement)
    {
        $statement->execute();
        $result = $statement->get_result();
        $return = [];
        while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
            $rowTemp = [];
            foreach ($row as $id => $col) {
                $rowTemp[$id] = $col;
            }
            $return[] = $rowTemp;
        }
        return $return;
    }

    public function close_connection(): void
    {
        $this->conexion->close();
    }
}
