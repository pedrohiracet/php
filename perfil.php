<?php
include_once('conexao.php');
$id = $_GET['id'];

$sql = 'SELECT *  FROM usuarios WHERE id = "$id"';
$resultado = $conexao->query($sql);
$pessoa = $resultado->fetch_assoc();


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php
    include_once('header.php');
    ?>
    <h1><?=$usuario['nome']?></h1>
</body>
</html>