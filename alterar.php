<?php
    
    if(isset($_POST['save'])){

        include_once('config.php');

        $id = $_POST['id'];
        $nome = $_POST['nome'];
        $telefone = $_POST['telefone'];

        $sql = "UPDATE pessoas SET nome = '$nome', telefone = '$telefone' WHERE id = '$id'";
        $result = mysqli_query($conexao, $sql);

        /*if ($result) {
            echo "Update realizado com sucesso!";
        } else {
            echo "Erro ao atualizar: " . mysqli_error($conexao);
        }*/
        header("location: index.php");
        exit;
    }

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
    <title>CRUD - ALTERAR</title>
    <link rel="stylesheet" href="CSS\formulario.css">
</head>
<body>
    <header>
        <h2>CRUD - THIAGO</h2>
    </header>

    <section>
        <form action="alterar.php" method="POST">
            <?php
            include_once('config.php');
            
            if (mysqli_num_rows($result) > 0) {
                $row = mysqli_fetch_assoc($result);
                $nome_atual = $row['nome'];
                $telefone_atual = $row['telefone'];
        
            ?>
            <input type="hidden" name="id" value="<?php echo $_GET['id'];?>">
            <label for="nome">Nome: </label>
            <input type="text" id="nome" name="nome" value="<?php echo $nome_atual;?>" required>
            <label for="telefone">Telefone: </label>
            <input type="number" id="telefone" name="telefone" value="<?php echo $telefone_atual;?>" required>
            <br>
            <input type="submit" id="submit" name="save" value="Salvar">
            <?php
                } else {
                    echo "<p>Usuario não encontrado</p>";
                }
            ?>
        </form>
    </section>
</body>
</html>