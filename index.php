<?php

    session_start();
    include_once('config.php');

    if (isset($_POST['delete'])) {

        $usuario_id = mysqli_real_escape_string($conexao, $_POST['delete']);
        $sql = "DELETE FROM pessoas WHERE id = '$usuario_id'";

        mysqli_query($conexao, $sql);

        if (mysqli_affected_rows($conexao) > 0) {
            $_SESSION['message'] = 'USUARIO DELETADO COM SUCESSO';
        } else {
            $_SESSION['message'] = 'ERRO AO DELETAR USUARIO';
        }

        header("location: index.php");
        exit;
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD - THIAGO</title>
    <link rel="stylesheet" href="CSS\exibicao.css">
</head>
<body>
    <header>
        <h2>CRUD - THIAGO</h2>
    </header>

    <?php
        if (isset($_SESSION['message'])) {
            echo "<h3>{$_SESSION['message']}</h3>";
            unset($_SESSION['message']);
        }
    ?>

    <section>
        <a href="adicionar.php"><button>ADICIONAR</button></a>
        <br><br>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>NOME</th>
                    <th>TELEFONE</th>
                    <th>AÇÕES</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $sql = "SELECT * FROM pessoas";
                    $usuarios = mysqli_query($conexao, $sql);

                    if (mysqli_num_rows($usuarios) > 0) {
                        foreach ($usuarios as $usuario) {
                ?>
                <tr>
                    <td><?=$usuario['id']?></td>
                    <td><?=$usuario['nome']?></td>
                    <td><?=$usuario['telefone']?>
                    <td class="action">
                        <a href="visualizar.php?id=<?=$usuario['id']?>"><button>VISUALIZAR</button></a>
                        <a href="alterar.php?id=<?=$usuario['id']?>"><button>ALTERAR</button></a>

                        <form action="index.php" method="POST">
                            <button type="submit" value="<?=$usuario['id']?>" name="delete">DELETAR</button>
                        </form>
                    </td>
                </tr>
                <?php
                        }
                    } else {
                        echo "<p>Nenhum usuario encontrado</p>";
                    }
                ?>
            </tbody>
        </table>
    </section>
</body>
</html>
