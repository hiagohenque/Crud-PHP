<?php

    if (isset($_GET['id'])) {
        include_once('config.php');
        $id = $_GET['id'];

        $query = "SELECT nome, telefone FROM pessoas WHERE id = '$id'";
        $result = mysqli_query($conexao, $query);
    } else {
        header("Location: index.php");
        exit;
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD - VISUALIZAR </title>
    <link rel="stylesheet" href="CSS\exibicao.css">
</head>
<body>
    <header>
        <h2>CRUD - THIAGO</h2>
    </header>

    <section>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>NOME</th>
                    <th>TELEFONE</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    include_once('config.php');
            
                    if (mysqli_num_rows($result) > 0) {
                        $row = mysqli_fetch_assoc($result);
                        $id = $_GET['id'];
                        $nome = $row['nome'];
                        $telefone = $row['telefone'];
        
                ?>
                <tr>
                    <th><?php echo $id;?></th>
                    <th><?php echo $nome;?></th>
                    <th><?php echo $telefone;?></th>
                </tr>
                <?php
                    } else {
                        echo "<p>Usuario não encontrado</p>";
                    }
            ?>
            </tbody>
        </table>
    </section>   
</body>
</html>