<?php

namespace Model\ServiceDB;

use Model\Cliente\AbstractCliente;

class ClienteDB
{
    protected $conn;
    protected $clientes = [];

    public function __construct(\PDO $conn)
    {
        $this->conn = $conn;
    }

    public function persist(AbstractCliente $cliente)
    {
        $this->clientes[] = $cliente;
    }

    public function flush()
    {
        foreach($this->clientes as $cliente){
            $stmt = $this->conn->prepare("INSERT INTO clientes (nome, idade, endereco, cpf, cnpj) VALUES (:nome, :idade, :endereco, :cpf, :cnpj);");
            $stmt->bindValue(":nome", $cliente->getNome());
            $stmt->bindValue(":idade", $cliente->getIdade());
            $stmt->bindValue(":endereco", $cliente->getEndereco());

            if($cliente instanceof PF){
                $stmt->bindValue("cpf", $cliente->getCPF());
                $stmt->bindValue("cnpj", null);
            } else{
                $stmt->bindValue("cpf", null);
                $stmt->bindValue("cnpj", $cliente->getCNPJ());
            }

            if ($stmt->execute()){
                return true;
            }

            return false;
        }
    }

    public function getAll()
    {
        $stmt = $this->conn->query("SELECT * FROM clientes;");

        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }
}