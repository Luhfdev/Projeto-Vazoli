<?php
include 'db.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "DELETE FROM alunos WHERE id = $id";
    if ($conn->query($sql) === TRUE) {
        $mensagem = "Aluno excluído com sucesso!";
        $classeMensagem = "mensagem-sucesso";
    } else {
        $mensagem = "Erro ao excluir: " . $conn->error;
        $classeMensagem = "mensagem-erro";
    }
}
?>

<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Excluir Aluno</title>
    <link rel="stylesheet" href="../frontend/styles.css">
</head>
<body>

    <div class="mensagem <?php echo $classeMensagem; ?>">
        <?php echo $mensagem; ?>
    </div>  

    <a href="index.php" class="btn-voltar-excluir">Voltar para a Lista</a>

</body>
</html>
