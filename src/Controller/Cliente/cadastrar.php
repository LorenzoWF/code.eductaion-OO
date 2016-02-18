<?php

$loader = require '../../../vendor/autoload.php';

$nome = $_POST['nome'];
$idade = $_POST['idade'];
$endereco = $_POST['endereco'];
$cpf_cnpj = $_POST['cpf_cnpj'];

if ($_POST['tipoCliente'] == '1'){
   $cliente = new Model\Cliente\ClientePF();
   $cliente->setCPF($cpf_cnpj);
} else{
   $cliente = new Model\Cliente\ClientePJ();
   $cliente->setCNPJ($cpf_cnpj);
}

$cliente->setNome($nome);
$cliente->setIdade($idade);
$cliente->setEndereco($endereco);

$connect = new Model\ServiceDB\ConnectDB();
$conn = $connect->getConn();
$crud = new Model\ServiceDB\ClienteDB($conn);
$crud->persist($cliente);
$resultado = $crud->flush();

if($resultado == true){
   header ('Location: ../../../index.php');
} else {
   echo "ERRO";
}

