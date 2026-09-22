<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    
    <?php

    include_once('header.php');

    
    ?>   
    
    <form action="postar.php" method="post">
        <h2>Criar post</h2>
        <small>Título</small>
        <input type="text" name="titulo">
        <small>Texto</small>
        <textarea name="texto" id=""></textarea>
        <button type="submit">Postar</button>
    </form>

    <main>
        <?php
        include_once('conexao.php');

        $sql = "SELECT * FROM posts ORDER BY id DESC LIMIT 10";
        $resultado = $conexao->query($sql);

        while( $post = $resultado->fetch_assoc() ){
            
            $idautor = $post['autor'];
            $sql = "SELECT * FROM usuarios WHERE id = '$idautor'";
            $resultado2 = $conexao->query($sql);
            $autor = $resultado2->fetch_assoc();

            echo('<div class="post">');
            echo('<h2>'.$post['titulo'].'</h2>');
            echo('<img class="foto" src="usuarios/'.$autor['foto'].'">');
            echo('<small>Autor: '.$autor['nome'].'</small>');
            echo('<small> | Data: '.$post['data'].'</small>');
            echo('<p>'.$post['texto'].'</p>');
            if( $post['autor'] == $_SESSION['id'] ){
                echo('<div class="postfooter"><a href="deletarpost.php?id='.$post['id'].'">Excluir</a></div>');
            }
            echo('</div>');
        }
        
        ?>
    </main>

</body>
</html>