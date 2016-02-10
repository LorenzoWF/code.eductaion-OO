<?php

class ServiceDB
{
  private $conn;
  private $classe;
  private $tabela;

  public function __construct($classe)
  {
    require_once './config/connect.php';

    $this->conn = $conn;
    $this->classe = $classe;
    $this->tabela = $classe->getTabela();
  }

  public function listar()
  {
    $query = "SELECT * FROM $this->tabela;";

    $stmt = $this->conn->query($query);

    return $stmt->fetchAll(\PDO::FETCH_ASSOC);
  }

}
