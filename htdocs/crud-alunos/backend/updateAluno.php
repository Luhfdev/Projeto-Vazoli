<?php
include 'db.php';

if (!isset($_GET['id']) || empty($_GET['id'])) {
    die("ID inválido.");
}

$id = $_GET['id'];

$sql = "SELECT * FROM alunos WHERE Id = $id";
$result = $conn->query($sql);

if ($result->num_rows == 0) {
    die("Aluno não encontrado.");
}

$aluno = $result->fetch_assoc();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST['nomeAluno'];
    $dataNascimento = $_POST['DataNascimento'];
    $mensalidade = $_POST['valorMensalidade'];
    $ativo = isset($_POST['Ativo']) ? 1 : 0;

    $sql = "UPDATE alunos SET 
                nomeAluno='$nome', 
                DataNascimento='$dataNascimento', 
                valorMensalidade='$mensalidade', 
                Ativo='$ativo' 
            WHERE Id=$id";

    if ($conn->query($sql) === TRUE) {
        header("Location: index.php");
        exit();
    } else {
        echo "Erro ao atualizar aluno: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Aluno</title>
    <link rel="stylesheet" href="../frontend/styles.css">
</head>
<body>
    <div class="container">
        <h2>Editar Aluno</h2>
        <form method="post">
            <label>Nome:</label>
            <input type="text" name="nomeAluno" value="<?php echo $aluno['nomeAluno']; ?>" required>

            <label>Data de Nascimento:</label>
            <input type="date" name="DataNascimento" value="<?php echo $aluno['DataNascimento']; ?>" required>

            <label>Mensalidade:</label>
            <input type="number" step="0.01" name="valorMensalidade" value="<?php echo $aluno['valorMensalidade']; ?>" required>

            <label>Ativo:</label>
            <input type="checkbox" name="Ativo" <?php echo $aluno['Ativo'] ? 'checked' : ''; ?>>

            <div class="btn-group">
                <button type="submit" class="btn-salvar">Salvar Alterações</button>
                <a href="index.php" class="btn-voltar">Voltar</a>
            </div>
        </form>
    </div>
</body>
</html>
