<?php

    if(isset($_POST['submit'])){

       include_once('config.php');

        $nome = $_POST['nome'];
        $telefone = $_POST['telefone'];

        $sql = "INSERT INTO pessoas(nome, telefone) VALUES('$nome', '$telefone')";
        $result = mysqli_query($conexao, $sql);

        header("location: index.php");
        exit;
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD - ADICIONAR</title>
    <link rel="stylesheet" href="CSS\formulario.css">
</head>
<body>
    <header>
        <h2>CRUD - THIAGO</h2>
    </header>

    <section>
        <form action="adicionar.php" method="POST">
            <label for="nome">Nome: </label>
            <input type="text" id="nome" name="nome" required>
            <label for="telefone">Telefone: </label>
            <input type="number" id="telefone" name="telefone" required>
            <br>
            <input type="submit" id="submit" name="submit">
        </form>
    </section>

</body>
</html>