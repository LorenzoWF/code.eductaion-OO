<?php

namespace Model\Cliente;

use Model\Interfaces\CRUD;

class Cliente implements CRUD
{
    private $tabela = 'clientes';
    private $parametros = array();

    //SETTERS
    public function setNome($nome)
    {
      $this->parametros['nome'] = $nome;
    }

    public function setIdade($idade)
    {
      $this->parametros['idade'] = $idade;
    }

    public function setTipoCliente($tipoCliente)
    {
      $this->parametros['tipocliente'] = $tipoCliente;
    }

    public function setCpf($cpf)
    {
      $this->parametros['cpf'] = $cpf;
    }

    public function setEndereco($endereco)
    {
      $this->parametros['endereco'] = $endereco;
    }


    //GETERS
    public function getTabela()
    {
      return $this->tabela;
    }

    public function getParametros()
    {
      return $this->parametros;
    }
}
