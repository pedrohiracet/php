<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <h1>Cadastrar</h1>

    <form action="cadastro-backend.php" method="post" enctype="multipart/form-data">
        <small>Nome</small>
        <input type="text" name="nome" value="<?= $_SESSION['old']['nome'] ?? '' ?>">
        <small>Email</small>
        <input type="email" name="email" value="<?= $_SESSION['old']['email'] ?? '' ?>">
        <small>Data de nascimento</small>
        <input type="date" name="nascimento" value="<?= $_SESSION['old']['nascimento'] ?? '' ?>">
        <small>Gênero</small>
        <select name="genero" id="">
            <option value="" disable selected></option>
            <option value="1">Masculino</option>
            <option value="2">Feminino</option>
            <option value="3">Outro</option>
        </select>
        <small>Foto</small>
        <input type="file" name="foto" accept="image/*">
        <small>Senha</small>
        <input type="password" name="senha">
        <small>Confirmar senha</small>
        <input type="password" name="confsenha">
        <button type=submit>Cadastrar</button>
        <p>Já tem uma conta? <a href="login.php">Entrar</a></p>
    </form>

    <?php
    if( isset($_SESSION['erros']) ){
        echo('<ul class="erros">');
        foreach($_SESSION['erros'] as $erro){
            echo('<li>'.$erro.'</li>');
        }
        echo('</ul>');
    }
    unset($_SESSION['erros'], $_SESSION['old']);
    ?>
    
</body>
</html>