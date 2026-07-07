<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Pessoas do banco</h1>


    <?php
    //criar conexão com o banco de dados
    $conexao = new mysqli('localhost','root','','aula');

    //montar query (comando pra ser executado no sql)
    $sql = "SELECT * FROM funcionários";

    //executar query no banco e guardar o resultado
    $resultado = $conexao->query($sql);

    //percorrer o resultado linha por linha
    //construindo uma table html
    echo('<table border>
        <tr>
            <th>id</th>
            <th>nome</th>
            <th>idade</th>
            <th>cidade</th>
            <th>EXCLUIR</th>
        </tr>');
    while( $linha = $resultado->fetch_assoc()){
        echo('<tr>
                <td>'.$linha['id'].'</td>
                <td>'.$linha['nome'].'</td>
                <td>'.$linha['idade'].'</td>
                <td>'.$linha['cidade'].'</td>
                <td><a href="deletarpessoa.php?id=.'$linha['id']'.">X</a></td>
            </tr>');
    }
    echo('</table>');
    ?>


<a href="aulaformulariofront.php">Adicionar Pessoa</a>
</body>
</html>