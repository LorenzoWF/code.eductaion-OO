<?php

class ServiceDB
{
  private $conn;
  private $classe;
  private $tabela;

  public function __construct(\PDO $conn, $classe)
  {
    $this->conn = $conn;;
    $this->classe = $classe;
    $this->tabela = $classe->getTabela();
  }

  public function listar()
  {
    $query = "SELECT * FROM $this->tabela;";

    $stmt = $this->conn->query($query);

    return $stmt->fetchAll(\PDO::FETCH_ASSOC);
  }

  public function cadastrar()
  {
    $colunas = array_keys($this->classe->getParametros());
    $values = $this->classe->getParametros();

    $stringColunas = implode(", ", $colunas);
    $stringValues = ":";
    $stringValues .= implode(", :", $colunas);

    $query = "INSERT INTO $this->tabela ($stringColunas) VALUES ($stringValues);";

    $stmt = $this->conn->prepare($query);

    foreach ($values as $coluna => $valor) {
      $stmt->bindValue(":".$coluna, $valor);
    }

    if ($stmt->execute()){
      return true;
    }

    return false;
  }

}
