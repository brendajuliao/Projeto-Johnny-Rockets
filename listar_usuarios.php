<?php
// Configurações do banco de dados
$host = "localhost";
$dbname = "delivery";
$username = "root"; // Altere para o nome de usuário do banco
$password = "";     // Coloque sua senha do banco (se houver)

try {
    // Conexão com o banco de dados
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Consultar os usuários
    $sql = "SELECT * FROM usuarios";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $usuarios = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Exibir os dados na tabela
    echo "<table border='1'>";
    echo "<tr><th>Nome</th><th>Telefone</th><th>CEP</th><th>Pedido</th></tr>";
    foreach ($usuarios as $usuario) {
        echo "<tr>
                <td>{$usuario['nome']}</td>
                <td>{$usuario['telefone']}</td>
                <td>{$usuario['cep']}</td>
                <td>{$usuario['pedido']}</td>
              </tr>";
    }
    echo "</table>";
} catch (PDOException $e) {
    echo "Erro: " . $e->getMessage();
}
?>