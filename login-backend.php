<?php
session_start();

// CONECTANDO COM O BANCO
include_once('conexao.php');

// RECEBENDO OS DADOS DE LOGIN
$email = $_POST['email'];
$senha = $_POST['senha'];

// CONSULTANDO SE EXISTE ESSE EMAIL
$sql = "SELECT * FROM usuarios WHERE email = '$email' ";
$resultado = $conexao->query($sql);

// CONFERINDO O ACESSO
if($resultado-> num_rows > 0){
    $usuario = $resultado->fetch_assoc();

    if( password_verify($senha, $usuario['senha']) ){
        // PEGAR ID DO USUÁRIO
        $_SESSION['id'] = $usuario['id'];
        header('Location: index.php');
        echo('a');
    }else{
        $_SESSION['erro'] = 'Senha incorreta.';
        //header('Location: login.php');
        echo('b');
    }
}else{
    $_SESSION['erro'] = 'Usuário não encontrado.';
    header('Location: login.php');
    echo('c');
}
?>