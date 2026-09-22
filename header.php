<header>
    <b>Site</b>
    <?php
    session_start();
    # SE NÃO TIVER LOGADO, TE FORÇA PRA TELA DE LOGIN
    if(!isset($_SESSION['id'])){
        header('Location: login.php');
    }else{
        echo('<a href="logout.php">Desconectar</a>');
    }
    ?>
</header>