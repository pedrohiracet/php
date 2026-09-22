<?php

session_start();
include_once('conexao.php');

$titulo = $_POST['titulo'];
$texto = $_POST['texto'];
$autor = $_SESSION['id'];
date_default_timezone_set('America/Sao_Paulo');
$data = date("d/n/Y H:i");

$sql = "INSERT INTO posts (titulo, texto, autor, data) VALUES ('$titulo','$texto','$autor','$data')";
$conexao->query($sql);

header('Location: index.php');

?>