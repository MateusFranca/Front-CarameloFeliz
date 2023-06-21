<?php
session_start();

// Conexão com o banco de dados
$host = "localhost";
$db_user = "root";
$db_password = "23021308";
$db_name = "carameloFeliz";

$conn = new mysqli($host, $db_user, $db_password, $db_name);
if ($conn->connect_error) {
    die("Erro na conexão com o banco de dados: " . $conn->connect_error);
}

// Obter os dados do formulário
$nome = $_POST['nome'];
$senha = $_POST['senha'];
$email = $_POST['email'];
$telefone = $_POST['telefone'];

// Criptografar a senha
$hashed_password = password_hash($senha, PASSWORD_DEFAULT);

// Inserir usuário no banco de dados
$sql = "INSERT INTO tabela_usuarios (nome, senha, telefone, email) VALUES ('$nome', '$hashed_password', '$telefone', '$email')";
if ($conn->query($sql) === TRUE) {
    echo "Cadastro realizado com sucesso!";
    header("Location: login.html");
    
} else {
    echo "Erro ao cadastrar o usuário: " . $conn->error;
}

$conn->close();
?>