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
$email = $_POST['inpEmail'];
$senha = $_POST['inpPassword'];

// Verificar se o usuário existe no banco de dados
$sql = "SELECT * FROM tabela_usuarios WHERE email = '$email'";
$result = $conn->query($sql);

if ($result->num_rows == 1) {
  $row = $result->fetch_assoc();
  $hashed_password = $row['senha'];

  // Verificar a senha
  if (password_verify($senha, $hashed_password)) {
    // Senha correta, redirecionar para a página de sucesso
    $_SESSION['usuario'] = $row['nome'];
    header("Location: index.html");
    exit();
  } else {
    // Senha incorreta
    echo "<script>alert('Usuário não encontrado.'); window.location.href = 'login.html';</script>";
  }
} else {
  // Usuário não encontrado ou email não verificado
  echo "<script>alert('Usuário não encontrado.'); window.location.href = 'login.html';</script>";
}

$conn->close();
?>
