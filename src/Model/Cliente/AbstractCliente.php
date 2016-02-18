<?php

namespace Model\Cliente;

abstract class AbstractCliente
{
    protected $id;
    protected $nome;
    protected $idade;
    protected $endereco;

    //SETTERS
    public function setId($id)
    {
        $this->nome = $nome;
    }

    public function setNome($nome)
    {
      $this->nome = $nome;
    }

    public function setIdade($idade)
    {
      $this->idade = $idade;
    }

    public function setEndereco($endereco)
    {
      $this->endereco = $endereco;
    }

    //GETTERS
    public function getId()
    {
        return $this->Id;
    }

    public function getNome()
    {
        return $this->nome;
    }

    public function getIdade()
    {
        return $this->idade;
    }

    public function getEndereco()
    {
        return $this->endereco;
    }

}
