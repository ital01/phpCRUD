<!doctype html>
<html lang="pt-BR">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <title>Cadastro</title>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand">Cadastro</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="?page=novo">Novo Usuario</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="?page=listar">Listar Usuarios</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<div class="container">
    <div class="row">
        <div class="col mt-5">
            <?php
            include("config.php");
            
            $requestPage = isset($_GET["page"]) ? $_GET["page"] : "";

            switch ($requestPage) 
            {
                case "novo":
                    include("novo-usuario.php");
                    break;

                case "listar":
                    include("listar-usuario.php");
                    break;

                case "editar":
                    include("editar-usuario.php");
                    break;

                case "salvar":
                    include("salvar-usuario.php");
                    break;

                case "buscar":
                    include("buscar-usuario.php");
                    break;

                default:
                    ?>
                <h1><img src="https://softhouse.inf.br/site/images/headers/SH_LOGO_CINZA207x79.png" alt="Descrição da imagem"></h1>
                <p><img src="https://softhouse.inf.br/site/images/imagens/Folder_-_GED_verso.jpg" alt="Descrição da imagem" width="762" height="1071"></p>
                    <?php
            }
            ?>
        </div>
    </div>
</div>

<script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>
