<?php

$loader = require '../../../vendor/autoload.php';

$nome = $_POST['nome'];
$idade = $_POST['idade'];
$tipoCliente = $_POST['tipoCliente'];
$cpf = $_POST['cpf'];
$endereco = $_POST['endereco'];

$cliente = new Model\Cliente\Cliente();
$cliente->setNome($nome);
$cliente->setIdade($idade);
$cliente->setTipoCliente($tipoCliente);
$cliente->setCpf($cpf);
$cliente->setEndereco($endereco);

$connect = new Model\ServiceDB\ConnectDB();
$conn = $connect->getConn();
$crud = new Model\ServiceDB\ServiceDB($conn);
$crud->persist($cliente);
$resultado = $crud->cadastrar();

if($resultado == true){
   header ('Location: ../../../index.php');
}

echo "ERRO";