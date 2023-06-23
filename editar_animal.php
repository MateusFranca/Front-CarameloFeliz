<?php
// editar_animal.php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $animalId = $_POST['animal_id'];

    // Aqui você precisa conectar ao banco de dados e recuperar os dados do animal a ser editado
    $conexao = new PDO("mysql:host=localhost;dbname=carameloFeliz", "root", "23021308");

    $query = "SELECT * FROM animais WHERE id = :animal_id";
    $statement = $conexao->prepare($query);
    $statement->bindValue(':animal_id', $animalId);
    $statement->execute();

    $animal = $statement->fetch(PDO::FETCH_ASSOC);
    ?>
    <!DOCTYPE html>
    <html lang="pt-br">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="style/doar.css">
        <title>Editar Animal</title>

    </head>

    <body>
        <header>
            <nav>
                <ul>
                    <li class="select">
                        <img class="logo-header" src="img/logo_branca.png" alt="Logo">
                    </li>
                    <li class="select"><a href="#">Adote</a></li>
                    <li><a href="doar.html">Doar</a></li>
                    <li><a href="meus_animais.php">Meus animais</a></li>
                </ul>
            </nav>
        </header>
        <h1>Editar Animal</h1>
        <form class="form-container" method="post" action="salvar_edicao_animal.php">
            <input type="hidden" name="animal_id" value="<?php echo $animal['id']; ?>">
            <div class="form-group">
                <label for="nome">Nome:</label>
                <input type="text" name="nome" value="<?php echo $animal['nome']; ?>">
            </div>
            <div class="form-group">
                <label for="idade">Idade:</label>
                <input type="text" name="idade" value="<?php echo $animal['idade']; ?>">
            </div>
            <div class="form-group">
                <label for="sexo">Sexo:</label>
                <input type="text" name="sexo" value="<?php echo $animal['sexo']; ?>">
            </div>
            <div class="form-group">
                <label for="tipo">Tipo:</label>
                <input type="text" name="tipo" value="<?php echo $animal['tipo']; ?>">
            </div>
            <div class="form-group">
                <label for="descricao">Descrição:</label>
                <textarea name="descricao"><?php echo $animal['descricao']; ?></textarea>
            </div>

            <div class="form-group">
                <label for="animal-image">Imagem:</label>
                <input type="file" name="animal-image" value="<?php echo $animal['imagem']; ?>">
            </div>

            <div class="form-group">
                <button type="submit">Salvar</button>
            </div>
        </form>
    </body>

    </html>

    <?php
    exit();
}
?>