<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/index.css">
    <title>Animal Shelter</title>
    <style>
        @media only screen and (max-width: 600px) {}

        body {
            background-color: #f8cc8f;
        }

        .contato {
            background-color: green;
            color: white;
            padding: 10px 20px;
            border-radius: 5px;
            border: none;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            margin-top: 1rem;
        }

        .contato:hover {
            background-color: darkgreen;
        }

        .whats {
        width: 15%;
        margin-left: 1rem;
        }
        a {
            display: flex;
            justify-content: center;
            text-decoration: none;

        }
    </style>
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
                <li>
                    <a href="login.html"><button>Login</button></a>
                </li>
            </ul>
        </nav>
    </header>

    <section id="container1">
        <h2>
            Todo animal de estimação merece um lar amoroso. Adote um animal de
            estimação hoje
        </h2>
        <p>
            Navegue pelos nossos animais disponíveis e saiba mais sobre o processo
            de adoção.<br />
            Juntos, podemos resgatar, reabilitar e realojar animais de estimação
            necessitados. Obrigado por apoiar nossa missão de levar alegria às
            famílias por meio da adoção de animais de estimação.
        </p>
    </section>

    <section id="container2">
        <label for="animal-type">Tipo do animal:</label>
        <select id="animal-type">
            <option value="cachorro">Cachorro</option>
            <option value="gato">Gato</option>
        </select>

        <input type="text" id="search-bar" placeholder="Pesquisar">
    </section>

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
                    <a href="https://api.whatsapp.com/send?phone=<?php echo $animal['contato']; ?>">
                        <button class="contato">Contato <img src="img/logos_whatsapp-icon.svg" class="whats"> </button>
                    </a>
                </div>
                <?php
            }
            ?>
        </div>
    </section>
</body>

</html>