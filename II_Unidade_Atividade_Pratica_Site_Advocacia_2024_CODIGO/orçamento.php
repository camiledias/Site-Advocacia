<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $cpf = $_POST['cpf'];
    $nome_completo = $_POST['nome_completo'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];
    $turno_para_contato = $_POST['turno_para_contato'];
    $vara_processual = $_POST['vara_processual'];
    $descricao_processo = $_POST['descricao_processo'];

    $conn = new mysqli('localhost', 'root', '', 'Advocacia');

    if ($conn->connect_error) {
        die("Conexão falhou: " . $conn->connect_error);
    }

    $sql = "INSERT INTO Orçamento (cpf, nome_completo, email, telefone, turno_para_contato, vara_processual, descricao_processo) VALUES ('$cpf', '$nome_completo', '$email', '$telefone', '$turno_para_contato', '$vara_processual', '$descricao_processo')";

    if ($conn->query($sql) === TRUE) {
        echo "Novo orçamento criado com sucesso!";
    } else {
        echo "Erro: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>

<form method="POST">
    <label>CPF:</label>
    <input type="text" name="cpf"><br>
    <label>Nome Completo:</label>
    <input type="text" name="nome_completo"><br>
    <label>Email:</label>
    <input type="text" name="email"><br>
    <label>Telefone:</label>
    <input type="text" name="telefone"><br>
    <label>Turno para Contato:</label>
    <input type="text" name="turno_para_contato"><br>
    <label>Vara Processual:</label>
    <input type="text" name="vara_processual"><br>
    <label>Descrição do Processo:</label>
    <textarea name="descricao_processo"></textarea><br>
    <button type="submit">Criar Orçamento</button>
</form>
