<?php
include 'db.php';

$query = "SELECT * FROM alunos";
$result = $conn->query($query);

if (!$result) {
    die("Erro na consulta: " . $conn->error);
}

$alunos = [];

while ($row = $result->fetch_assoc()) {
    $alunos[] = [
        'id' => $row['Id'],
        'nomeAluno' => $row['nomeAluno'],
        'DataNascimento' => $row['DataNascimento'],
        'Ativo' => $row['Ativo'],
        'valorMensalidade' => $row['valorMensalidade']
    ];
}

header('Content-Type: application/json');
echo json_encode($alunos, JSON_PRETTY_PRINT);
?>
