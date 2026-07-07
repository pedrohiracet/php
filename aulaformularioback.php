<?php

// conexão com o banco
$conexao = new mysqli('localhost', 'root', '', 'aula');

// coleta das informações do formulário
$nome = @$_POST['nome'];
$idade = @$_POST['idade'];
$cidade = @$_POST['cidade'];

// construindo o comando sql
$sql = "INSERT INTO funcionários (nome, idade, cidade) VALUES ('$nome', '$idade', '$cidade')";
// executando no sql
$conexao->query($sql);

// leva pra outra página
header('Location: pessoas.php');

?>