<?php

//CONECTANDO COM PDO
$config = parse_ini_file('config.ini');
$driver = $config['driver'];
$host = $config['host'];
$port = $config['port'];
$dbname = $config['dbname'];
$user = $config['user'];
$pass = $config['pass'];

$conn = new \PDO($driver.':host='.$host.';port='.$port.';dbname='.$dbname, $user, $pass);

//LIMPANDO TABELAS
$conn->query("DROP TABLE IF EXISTS clientes;");

//TABELA clientes

//CRIAR TABELA
$conn->query("CREATE TABLE clientes (
  id SERIAL,
  nome VARCHAR(25) NOT NULL,
  idade INT NOT NULL,
  endereco VARCHAR(25) NOT NULL,
  cpf VARCHAR (15) NULL,
  cnpj VARCHAR (20) NULL,
  PRIMARY KEY (id)
  );"
);

//INSERINDO DADOS
$nome = array('Blade','Terminator','Rambo','Rock Balboa','Neo', 'John Matrix', 'Beatrix Kiddo', 'Mad Max', 'Shao kahn', 'Leonidas');
$idade = array(25, 37, 35, 23, 20, 30, 25, 22, 23, 78);
$tipoCliente = array(1, 1, 1, 1, 1, 1, 1, 1, 1, 1);
$endereco = array('Esgoto','Skynet','Floresta no Vietna','Philadelfia','Matrix', 'Não lembro', 'Casa do Pai Mei', 'Deserto na Australia', 'Outwolrd', 'Termopilas');
$cpf = array('123.456.789-01', '123.456.789-01', '123.456.789-01', '123.456.789-01', '123.456.789-01', '123.456.789-01', '123.456.789-01', '123.456.789-01', '123.456.789-01', '123.456.789-01', );


for ($x=0; $x<10; $x++){
  $stmt = $conn->prepare("INSERT INTO clientes (nome, idade, endereco, cpf, cnpj) VALUES (:nome, :idade, :endereco, :cpf, :cnpj);");
  $stmt->bindValue(":nome", $nome[$x]);
  $stmt->bindValue(":idade", $idade[$x]);
  $stmt->bindValue(":endereco", $endereco[$x]);
  $stmt->bindValue(":cpf", $cpf[$x]);
  $stmt->bindValue(":cnpj", null);
  $stmt->execute();
}
