<?php
// Conexão com o banco de dados
$servername = "localhost";
$username = "root";
$password = "23021308";
$dbname = "carameloFeliz";

$conn = new mysqli($servername, $username, $password, $dbname);

// Verifique a conexão
if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}

// Obtém o ID do card a ser excluído
$id = $_POST['id'];

// Consulta para excluir o card do banco de dados
$sql = "DELETE FROM animais WHERE id = $id";

if ($conn->query($sql) === TRUE) {
    echo "Card excluído com sucesso!";
} else {
    echo "Erro ao excluir o card: " . $conn->error;
}

$conn->close();
?>
