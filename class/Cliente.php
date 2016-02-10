<?php

class Cliente
{
    private $tabela = 'clientes';
    private $parametros = array();

    //SETTERS
    public function novoCliente($nome, $idade, $cpf, $endereco)
    {
      $this->parametros['nome'] = $nome;
      $this->parametros['idade'] = $idade;
      $this->parametros['cpf'] = $cpf;
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
