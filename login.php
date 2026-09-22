<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <h1>Login</h1>
    <form action="login-backend.php" method="post">
        <small>Email</small>
        <input type="email" name="email">
        <small>Senha</small>
        <input type="password" name="senha">
        <button type="submit">Entrar</button>
        <p>Ainda não tem uma conta? <a href="cadastro.php">Cadastrar</a></p>
    </form>

    <?php
    session_start();
    if( isset($_SESSION['erro']) ){
        echo('<p class="erros">'.$_SESSION['erro'].'</p>');
        unset($_SESSION['erro']);
    }
    ?>

</body>
</html>