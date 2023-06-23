<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/index.css">
    <title>Animal Shelter</title>
    <style>
        @media only screen and (max-width: 600px) {}


        form {
    margin-top: 20px;
    display: inline-block;
}

#red-button {
    background-color: red;
    color: white;
    padding: 10px 20px;
    border-radius: 5px;
    border: none;
    font-size: 16px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

#red-button:hover {
    background-color: darkred;
}

#blue-button {
    background-color: blue;
    color: white;
    padding: 10px 20px;
    border-radius: 5px;
    border: none;
    font-size: 16px;
    cursor: pointer;
    transition: background-color 0.3s ease;
    margin-right: 20px;
}

#blue-button:hover {
    background-color: darkblue;
}

body{
    background-color: #f8cc8f;
}
    </style>
</head>

<body>
    <header>
        <nav>
            <ul>
                <li>
                    <img class="logo-header" src="img/logo_branca.png" alt="Logo" />
                </li>
                <li><a href="adote.php">Adote</a></li>
                <li><a href="doar.html">Doar</a></li>
                <li class="select"><a href="meus_animais.php">Meus animais</a></li>
            </ul>
        </nav>
    </header>

    <section id="container3">
        <div class="row">
            <?php
            // Aqui você precisa conectar ao banco de dados e recuperar os dados dos animais
            $conexao = new PDO("mysql:host=localhost;dbname=carameloFeliz", "root", "23021308");

            $query = "SELECT * FROM animais";
            $resultado = $conexao->query($query);

            while ($animal = $resultado->fetch(PDO::FETCH_ASSOC)) {
                ?>
                <div class="card">
                    <img src="<?php echo $animal['imagem']; ?>" alt="<?php echo $animal['nome']; ?>">
                    <h3>
                        <?php echo $animal['nome']; ?>
                    </h3>
                    <p>Idade:
                        <?php echo $animal['idade']; ?>
                    </p>
                    <p>Sexo:
                        <?php echo $animal['sexo']; ?>
                    </p>
                    <p>Tipo:
                        <?php echo $animal['tipo']; ?>
                    </p>
                    <p>Descrição:
                        <?php echo $animal['descricao']; ?>
                    </p>
                    <p>Contato:
                        <?php echo $animal['contato']; ?>
                    </p>
                    <form method="post" action="editar_animal.php">
                        <input type="hidden" name="animal_id" value="<?php echo $animal['id']; ?>">
                        <button type="submit" id="blue-button">Editar</button>
                    </form>
                    <form method="post" action="excluir_animal.php">
                        <input type="hidden" name="animal_id" value="<?php echo $animal['id']; ?>">
                        <button type="submit" id="red-button">Excluir</button>
                    </form>
                </div>
                <?php
            }
            ?>
        </div>
    </section>
</body>

</html>