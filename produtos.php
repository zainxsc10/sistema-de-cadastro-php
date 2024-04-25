<?php
// Informações de conexão com o banco de dados
$host = 'localhost';
$dbname = 'sistema';
$username = 'root';
$password = '';

//Criar conexão
$conn = new mysqli($host, $username, $password, $dbname);

//Verificar Conexão
if ($conn->connect_error) {
    die("Conexão falhou " . $conn->connect_error);
}

// Seleccionar todos os Produtos da tabela produtos
$sql = "SELECT nome, descricao, preco, foto FROM produtos";
$result = $conn->query($sql);

// Exibir os Produtos 
if ($result ->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<h2>" . $row['nome'] . "</h2>";
        echo "<p><strong>Descrição:</strong> " . $row['descricao'] . "</p>";
        echo "<p><strong>Preço:</strong> R$ " . number_format($row['preço'], 2, ',', '.') . "</p>";
        echo "<img src="uploads/' . $row['foto'] . '" alt="' . $row['nome'] . '" whidth="200"><br><br>';
    }
} else {
    echo "Nenhum produto cadastrado.";
}

// Fechar conexão
$conn->close();
?>