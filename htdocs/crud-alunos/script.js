document.addEventListener("DOMContentLoaded", function() {
    fetchAlunos();
});

function fetchAlunos() {
    fetch("getAlunos.php")
        .then(response => response.json())
        .then(data => {
            let tbody = document.getElementById("alunos-list");
            tbody.innerHTML = "";

            data.forEach(aluno => {
                let row = `<tr>
                    <td>${aluno.id}</td>
                    <td>${aluno.nomeAluno}</td>
                    <td>${aluno.DataNascimento}</td>
                    <td>R$ ${parseFloat(aluno.valorMensalidade).toFixed(2)}</td>
                    <td>${aluno.Ativo ? 'Sim' : 'Não'}</td>
                    <td>
                        <a href="updateAluno.php?id=${aluno.id}">Editar</a> | 
                        <a href="deleteAluno.php?id=${aluno.id}" onclick="return confirm('Tem certeza?')">Excluir</a>
                    </td>
                </tr>`;
                tbody.innerHTML += row;
            });
        });
}
