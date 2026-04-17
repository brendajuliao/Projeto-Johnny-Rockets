<?php

// Configurações do banco de dados
$host = "localhost";
$dbname = "delivery";
$username = "formulario-brenda"; // Altere para o nome de usuário do banco
$password = "";     // Coloque sua senha do banco (se houver)

try {
    // Conexão com o banco de dados
    $conn = new mysqli("mysql:host=$host;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Receber os dados enviados via POST
    $nome = $_POST['nome'];
    $telefone = $_POST['telefone'];
    $cep = $_POST['cep'];
    $pedido = $_POST['pedido'];

    // Inserir os dados na tabela
    $sql = "INSERT INTO usuarios (nome, telefone, cep, pedido) VALUES (:nome, :telefone, :cep, :pedido)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':nome', $nome);
    $stmt->bindParam(':telefone', $telefone);
    $stmt->bindParam(':cep', $cep);
    $stmt->bindParam(':pedido', $pedido);
    $stmt->execute();

    echo "Usuário salvo com sucesso!";
} catch (PDOException $e) {
    echo "Erro: " . $e->getMessage();
}
?>

?>