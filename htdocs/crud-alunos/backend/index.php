<?php include 'db.php'; ?>

<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD de Alunos</title>
    <link rel="stylesheet" href="../frontend/styles.css">
    <style>
        .btn-add {
            background-color: green;
            color: white;
            padding: 10px 15px;
            border: none;
            cursor: pointer;
            border-radius: 5px;
            font-size: 16px;
        }
        .btn-add:hover {
            background-color: darkgreen;
        }
    </style>
</head>
<body>
    <h1>CADASTRO DE ALUNOS</h1>
    
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Data de Nascimento</th>
                <th>Mensalidade</th>
                <th>Ativo</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
    <?php
    include 'db.php';
    $sql = "SELECT * FROM alunos";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["Id"] . "</td>";
            echo "<td>" . $row["nomeAluno"] . "</td>";
            echo "<td>" . $row["DataNascimento"] . "</td>";
            echo "<td>R$ " . number_format($row["valorMensalidade"], 2, ',', '.') . "</td>";
            echo "<td>" . ($row["Ativo"] ? "Sim" : "Não") . "</td>";
            echo "<td>
                <a href='updateAluno.php?id=" . $row["Id"] . "' class='btn-editar'>Editar</a>
                <a href='deleteAluno.php?id=" . $row["Id"] . "' class='btn-excluir'>Excluir</a>
            </td>";
            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='6'>Nenhum aluno cadastrado.</td></tr>";
    }
    $conn->close();
    ?>
</tbody>

    </table>

    <button class="btn-add" onclick="window.location.href='createAluno.php'">Adicionar Novo Aluno</button>

    <script src="script.js"></script>
</body>
</html>
