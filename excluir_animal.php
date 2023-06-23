<?php
// excluir_animal.php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $animalId = $_POST['animal_id'];

    // Aqui você precisa conectar ao banco de dados e executar a lógica de exclusão
    $conexao = new PDO("mysql:host=localhost;dbname=carameloFeliz", "root", "23021308");

    $query = "DELETE FROM animais WHERE id = :animal_id";
    $statement = $conexao->prepare($query);
    $statement->bindValue(':animal_id', $animalId);
    $statement->execute();

    // Redirecionar de volta para a página principal ou qualquer outra página desejada
    header("Location: meus_animais.php");
    exit();
}
?>