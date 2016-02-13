<?php

require '../../../config/connect.php';

define("CLASS_DIR","../../");
set_include_path(get_include_path().PATH_SEPARATOR.CLASS_DIR);
spl_autoload_register(function ($class) {
   require_once(str_replace('\\', '/', $class . '.php'));
});

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

$crud = new Model\ServiceDB\ServiceDB($conn, $cliente);
$resultado = $crud->cadastrar();

if($resultado == true){
   header ('Location: ../../../index.php');
}

echo "ERRO";