<?php
session_start();
if((!isset($_SESSION['email']) == true ) and (!isset($_SESSION['senha']) == true)){
    unset($_SESSION['email']);
    unset($_SESSION['senha']);
    header('Location: login.php');
}

include "db_conn.php";
$id = $_GET['id'];

if (isset($_POST['submit'])) {
    $modelo = mysqli_real_escape_string($conn, $_POST['modelo_item']);
    $descricao = mysqli_real_escape_string($conn, $_POST['descricao']);
    $quantidade = mysqli_real_escape_string($conn, $_POST['quantidade']);
    $tipo = mysqli_real_escape_string($conn, $_POST['tipo_item']);
    $valor = mysqli_real_escape_string($conn, $_POST['valor']);
    $categoria = mysqli_real_escape_string($conn, $_POST['categoria']);

    $sql = "UPDATE `itens` SET `modelo_item`='$modelo',`descricao`='$descricao',`valor`='$valor',`categoria`='$categoria', `quantidade`='$quantidade', `tipo_item`='$tipo' WHERE id=$id";

    $result = mysqli_query($conn, $sql);

    if ($result) {
        header("Location: list.php?msg=Atualizado com sucesso!");
        exit();
    } else {
        echo "Falha: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css" integrity="sha512-5Hs3dF2AEPkpNAR7UiOHba+lRSJNeM2ECkwxUIxC1Q/FLycGTbNapWXB4tP889k5T5Ju8fs4b1P5z/iB4nMfSQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <title>Editar Item</title>

    <style>
        body {
            display: flex;
            flex-direction: column;
            min-height: 100vh; 
            background-color: #f8f9fa;
            margin: 0;
        }
        main {
            flex: 1; 
        }
        .form-container {
            background-color: #ffffff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 600px;
        }
        footer {
            background-color: #6e78aa; 
        }
        footer img {
            width: 30px;
            height: 30px;
        }
    </style>
</head>
<body>

    <header class="navbar navbar-light" style="background-color: #3477eb; color: white;">
        <div class="container d-flex justify-content-between align-items-center">
            <h1 class="fs-3 mb-0 text-center flex-grow-1">Database Register</h1>
            <a href="dashboard.php" class="btn btn-light header-btn ms-3"><i class="fa fa-arrow-left"></i>Voltar</a>
            <a href="exit.php" class="btn btn-danger ms-3">Sair</a>
        </div>
    </header>

    <main>
        <div class="container mt-4">
            <div class="text-center mb-4">
                <h3>Editar Informações do Item</h3>
                <p class="text-muted">Atualize os detalhes do item selecionado</p>
            </div>

            <div class="d-flex justify-content-center">
                <div class="form-container">
                    <form action="" method="post">
                        <div class="row mb-3">
                            <div class="col-12 col-md-6">
                                <label class="form-label">Modelo:</label>
                                <input type="text" class="form-control" name="modelo_item" value="" required>
                            </div>

                            <div class="col-12 col-md-6 mt-3 mt-md-0">
                                <label class="form-label">Categoria:</label>
                                <input type="text" class="form-control" name="categoria" value="" required>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Descrição:</label>
                            <textarea class="form-control" name="descricao" rows="3" required></textarea>
                        </div>

                        <div class="row mb-3">
                            <div class="col-12 col-md-6">
                                <label class="form-label">Quantidade:</label>
                                <input type="number" class="form-control" name="quantidade" min="0" required>
                            </div>

                            <div class="col-12 col-md-6 mt-3 mt-md-0">
                                <label class="form-label">Tipo do Item:</label>
                                <select class="form-select" name="tipo_item" required>
                                    <option value="unidade">Unidade</option>
                                    <option value="caixa">Caixa</option>
                                    <option value="kit">Kit</option>
                                    <option value="par">Par</option>
                                    <option value="pacote">Pacote</option>
                                </select>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Valor do Item (R$):</label>
                            <input type="number" class="form-control" name="valor" step="0.01" min="0" required>
                        </div>

                        <div class="text-center">
                            <button type="submit" class="btn btn-success w-100 mb-2"><i class="fa fa-save"></i> Salvar</button>
                            <a href="list.php" class="btn btn-danger w-100"><i class="fa fa-times"></i> Cancelar</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>

    <footer class="text-white text-center py-4">
        <p class="mb-0">Todos os direitos reservados.</p>
        <div class="d-flex justify-content-center gap-3 mt-2">
            <a href="https://github.com/JotapeCruzz" target="_blank" class="text-white">
                <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/github/github-original.svg" alt="GitHub">
            </a>
            <a href="https://linkedin.com" target="_blank" class="text-white">
                <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/linkedin/linkedin-original.svg" alt="LinkedIn">
            </a>
        </div>
    </footer>

    <!-- Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>


