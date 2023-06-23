<?php
// salvar_cadastro_animal.php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = $_POST['animal-name'];
    $idade = $_POST['animal-age'];
    $sexo = $_POST['animal-sex'];
    $contato = $_POST['animal-contact'];
    $tipo = $_POST['animal-type'];
    $descricao = $_POST['animal-description'];
    $img = $_POST['animal-image']; 

    // Conexão com o banco de dados
    $conexao = new PDO("mysql:host=localhost;dbname=carameloFeliz", "root", "23021308");

    // Inserção dos dados no banco
    $query = "INSERT INTO animais (nome, idade, sexo, contato, tipo, descricao, imagem) VALUES (:nome, :idade, :sexo, :contato, :tipo, :descricao, :imagem)";
    $statement = $conexao->prepare($query);
    $statement->bindValue(':nome', $nome);
    $statement->bindValue(':idade', $idade);
    $statement->bindValue(':sexo', $sexo);
    $statement->bindValue(':contato', $contato);
    $statement->bindValue(':tipo', $tipo);
    $statement->bindValue(':descricao', $descricao);
    $statement->bindValue(':imagem', $img);
    $statement->execute();

    // Redirecionamento após o cadastro
    header("Location: meus_animais.php");
    exit();
}
?>