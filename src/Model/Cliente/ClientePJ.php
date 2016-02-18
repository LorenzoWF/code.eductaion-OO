<?php

namespace Model\Cliente;

use Model\Cliente\AbstractCliente;
use Model\Cliente\Contracts\PJ;

class ClientePJ extends AbstractCliente implements PJ
{
    protected $cnpj;

    public function setCNPJ($cnpj)
    {
        $this->cnpj = $cnpj;
    }

    public function getCNPJ()
    {
        return $this->cnpj;
    }
}