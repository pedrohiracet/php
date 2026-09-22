<?php

include_once('conexao.php');

$idpost = $_GET['id'];

$sql = "DELETE FROM posts WHERE id = '$idpost'";
$conexao->query($sql);

header('Location: index.php');

?>