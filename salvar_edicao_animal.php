<?php
// salvar_edicao_animal.php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $animalId = $_POST['animal_id'];
    $nome = $_POST['nome'];
    $idade = $_POST['idade'];
    $sexo = $_POST['sexo'];
    $tipo = $_POST['tipo'];
    $descricao = $_POST['descricao'];
    $imagem = $_POST['imagem'];

    // Aqui você precisa conectar ao banco de dados e executar a lógica de atualização
    $conexao = new PDO("mysql:host=localhost;dbname=carameloFeliz", "root", "23021308");

    $query = "UPDATE animais SET nome = :nome, idade = :idade, sexo = :sexo, tipo = :tipo, descricao = :descricao, imagem = :imagem WHERE id = :animal_id";
    $statement = $conexao->prepare($query);
    $statement->bindValue(':animal_id', $animalId);
    $statement->bindValue(':nome', $nome);
    $statement->bindValue(':idade', $idade);
    $statement->bindValue(':sexo', $sexo);
    $statement->bindValue(':tipo', $tipo);
    $statement->bindValue(':descricao', $descricao);
    $statement->bindValue(':imagem', $imagem);
    $statement->execute();

    // Redirecionar de volta para a página principal ou qualquer outra página desejada
    header("Location: adote.php");
    exit();
}
?>