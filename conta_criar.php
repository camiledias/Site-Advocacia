<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $numero_oab = $_POST['numero_oab'];
    $nome_completo = $_POST['nome_completo'];
    $email = $_POST['email'];
    $cpf = $_POST['cpf'];

    $conn = new mysqli('localhost', 'root', '', 'Advocacia');

    if ($conn->connect_error) {
        die("Conexão falhou: " . $conn->connect_error);
    }

    $sql = "INSERT INTO Conta (numero_oab, nome_completo, email, cpf) VALUES ('$numero_oab', '$nome_completo', '$email', '$cpf')";

    if ($conn->query($sql) === TRUE) {
        echo "Nova conta criada com sucesso!";
    } else {
        echo "Erro: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>

<form method="POST">
    <label>Número OAB:</label>
    <input type="text" name="numero_oab"><br>
    <label>Nome Completo:</label>
    <input type="text" name="nome_completo"><br>
    <label>Email:</label>
    <input type="text" name="email"><br>
    <label>CPF:</label>
    <input type="text" name="cpf"><br>
    <button type="submit">Criar Conta</button>
</form>
