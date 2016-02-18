<?php

namespace Model\Cliente;

use Model\Cliente\AbstractCliente;
use Model\Cliente\Contracts\PF;

class ClientePF extends AbstractCliente implements PF
{
    protected $cpf;

    public function setCPF($cpf)
    {
        $this->cpf = $cpf;
    }

    public function getCPF()
    {
        return $this->cpf;
    }

}