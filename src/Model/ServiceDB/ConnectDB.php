<?php

namespace Model\ServiceDB;

class ConnectDB
{
    private $conn;

    public function __construct()
    {
        try {

            if (file_exists('../../../config/config.ini')){
                $config = parse_ini_file('../../../config/config.ini');
            } else {
                $config = parse_ini_file('./././config/config.ini');
            }

            $driver = $config['driver'];
            $host = $config['host'];
            $port = $config['port'];
            $dbname = $config['dbname'];
            $user = $config['user'];
            $pass = $config['pass'];

            $conn = new \PDO($driver.':host='.$host.';port='.$port.';dbname='.$dbname, $user, $pass);

            $this->conn = $conn;

        } catch (\PDOException $e){

            die("Erro Codigo: ".$e->getCode().":" .$e->getMessage());

        }
    }

    public function getConn()
    {
        return $this->conn;
    }
}