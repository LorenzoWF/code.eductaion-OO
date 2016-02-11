<?php

require '../../class/Cliente.php';
require '../../config/connect.php';
require '../../class/ServiceDB.php';

$nome = $_POST['nome'];
$idade = $_POST['idade'];
$tipoCliente = $_POST['tipoCliente'];
$cpf = $_POST['cpf'];
$endereco = $_POST['endereco'];

$cliente = new Cliente();
$cliente->setNome($nome);
$cliente->setIdade($idade);
$cliente->setTipoCliente($tipoCliente);
$cliente->setCpf($cpf);
$cliente->setEndereco($endereco);

$crud = new ServiceDB($conn, $cliente);
$resultado = $crud->cadastrar();

//print_r($resultado);

if($resultado = true){
   header ('Location: ../../index.php');
}

echo "ERRO";
