<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST['nomeAluno'];
    $dataNascimento = $_POST['DataNascimento'];
    $mensalidade = $_POST['valorMensalidade'];
    $ativo = isset($_POST['Ativo']) ? 1 : 0;

    $sql = "INSERT INTO alunos (nomeAluno, DataNascimento, valorMensalidade, Ativo) 
            VALUES ('$nome', '$dataNascimento', '$mensalidade', '$ativo')";

    if ($conn->query($sql) === TRUE) {
        header("Location: index.php");
        exit();
    } else {
        echo "Erro ao cadastrar aluno: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Aluno</title>
    <link rel="stylesheet" href="../frontend/styles.css">
</head>
<body>
    <div class="container">
        <h2>Cadastrar Aluno</h2>
        <form method="post">
            <label>Nome:</label>
            <input type="text" name="nomeAluno" required>
            
            <label>Data de Nascimento:</label>
            <input type="date" name="DataNascimento" required>
            
            <label>Mensalidade:</label>
            <input type="number" step="0.01" name="valorMensalidade" required>
            
            <label>Ativo:</label>
            <input type="checkbox" name="Ativo">

            <div class="btn-group">
                <button type="submit" class="btn-salvar">Salvar</button>
                <a href="index.php" class="btn-voltar">Voltar</a>
            </div>
        </form>
    </div>
</body>
</html>
