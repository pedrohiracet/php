<?php
$conexao = new mysqli('localhost','root','','pessoa');

$id = $_GET['id'];

$sql = "DELETE FROM pessoas WHERE id = '$id'";
$conexao->query($sql)


?>
