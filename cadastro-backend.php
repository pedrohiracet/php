<?php

session_start();
include_once('conexao.php');

# COLETA DAS INFORMAÇÕES

$nome = $_POST['nome'];
$email = $_POST['email'];
$nascimento = $_POST['nascimento'];
$genero = $_POST['genero'];
$senha = $_POST['senha'];
$confsenha = $_POST['confsenha'];

# PERSISTIR INFORMAÇÕES

$_SESSION['old'] = $_POST;

# VALIDAÇÕES

$erros = [];

$dataAtual = new DateTime();
$dataAtual->modify('-1 day');
$dataUsuario = new DateTime($nascimento);

if(empty($nome)){
    $erros[] = 'Nome não preenchido';
}
if(strlen($senha)<6){
    $erros[] = 'Senha muito pequena';
}
if($senha!=$confsenha){
    $erros[] = 'Senhas não correspondem';
}
if($dataUsuario > $dataAtual){
    $erros[] = 'Esta data ainda não aconteceu';
}
$sql = "SELECT * FROM usuarios WHERE email = '$email'";
$resultado = $conexao->query($sql);
if ($resultado->num_rows > 0){
    $erros[] = 'Email já utilizado';
}

# CRIPTOGRAFIA
$senhacripto = password_hash($senha,PASSWORD_DEFAULT);

# CONFERIR ERROS
if( count($erros) > 0 ){
    $_SESSION['erros'] = $erros;
    header('Location: cadastro.php');
}else{

    # FOTO
    $nome_foto = 'default.png'; // valor padrão
    if (isset($_FILES['foto']) && $_FILES['foto']['error'] === UPLOAD_ERR_OK) {
        $extensao = pathinfo($_FILES['foto']['name'], PATHINFO_EXTENSION);
        $novo_nome = uniqid() . "." . $extensao;
        $destino = "usuarios/" . $novo_nome;

        if (move_uploaded_file($_FILES['foto']['tmp_name'], $destino)) {
            $nome_foto = $novo_nome;
        }
    }

    # SALVAR
    $sql = "INSERT INTO usuarios (nome, email, nascimento, genero, senha, foto) VALUES ('$nome', '$email', '$nascimento', '$genero', '$senhacripto', '$nome_foto')";
    $conexao->query($sql);
    header('Location: login.php');
}

?>