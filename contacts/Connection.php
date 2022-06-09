<?php
class Connection
{
    private mysqli $con;

    public function __construct()
    {
        $this->con = new mysqli("localhost", "root", "", "contactos");
        if ($this->con->connect_errno) {
            print "Fallo al conectar a MariaDB: (" . $this->con->connect_errno . ") " . $this->con->connect_error;
        }
    }

    public function get_connection(): mysqli
    {
        return $this->con;
    }

    public function get_info(): array
    {
        return [
            "PHP VERSION" => phpversion(),
            "HOST" => $this->con->host_info,
            "SERVER" => $this->con->server_info,
            "SERVER VERSION" => $this->con->server_version,
            "VERSION PROTOCOL" => $this->con->protocol_version,
        ];
    }
}
