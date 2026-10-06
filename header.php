    <?php
    session_start();
    include_once('conexao.php');
    # SE NÃO TIVER LOGADO, TE FORÇA PRA TELA DE LOGIN
    if(!isset($_SESSION['id'])){
        header('Location: login.php');
    }else{
       $id = $_SESSION['id'];
       $sql = "SELECT * FROM usuarios WHERE id = '$id'";
       $resultado = $conexao->query($sql);
       $usuario = $resultado->fetch_assoc();
    }
    ?>

<header>
    <div>
        <img class="foto" src="usuarios/<?=$usuario['foto']?>" >
        <h2><?=$usuario['nome']?></h2>
    </div>
    <div>
        <a href="index.php">Page.Principal</a>
        <a href="logout.php">Desconectar</a>
    </div>
</header>