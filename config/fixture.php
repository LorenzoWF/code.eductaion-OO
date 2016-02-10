<?php

require_once 'connect.php';

//LIMPANDO TABELAS
$conn->query("DROP TABLE IF EXISTS clientes;");

//TABELA clientes

//CRIAR TABELA
$conn->query("CREATE TABLE clientes (
	id SERIAL,
	nome VARCHAR(25) NOT NULL,
  idade INT NOT NULL,
  cpf VARCHAR(14),
  endereco VARCHAR(25) NOT NULL,
	PRIMARY KEY (id)
  );"
);

//INSERINDO DADOS
$nome = array('Blade','Terminator','Rambo','Rock Balboa','Neo', 'John Matrix', 'Beatrix Kiddo', 'Mad Max', 'Shao kahn', 'Leonidas');
$idade = array(25, 37, 35, 23, 20, 30, 25, 22, 23, 78);
$cpf = array('123.456.789-01', '123.456.789-01', '123.456.789-01', '123.456.789-01', '123.456.789-01', '123.456.789-01', '123.456.789-01', '123.456.789-01', '123.456.789-01', '123.456.789-01', );
$endereco = array('Esgoto','Skynet','Floresta no Vietna','Philadelfia','Matrix', 'Não lembro', 'Casa do Pai Mei', 'Deserto na Australia', 'Outwolrd', 'Termopilas');

for ($x=0; $x<10; $x++){
  $stmt = $conn->prepare("INSERT INTO clientes (nome, idade, cpf, endereco) VALUES (:nome, :idade, :cpf, :endereco);");
  $stmt->bindValue(":nome", $nome[$x]);
  $stmt->bindValue(":idade", $idade[$x]);
  $stmt->bindValue(":cpf", $cpf[$x]);
  $stmt->bindValue(":endereco", $endereco[$x]);
  $stmt->execute();
}
