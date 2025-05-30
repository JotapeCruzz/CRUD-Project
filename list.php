<?php
session_start();
if((!isset($_SESSION['email']) == true ) and (!isset($_SESSION['senha']) == true)){
    unset($_SESSION['email']);
    unset($_SESSION['senha']);
    header('Location: login.php');
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

    <title>Listagem de Itens</title>

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
        .navbar {
            color: white;
        }
        .table-container {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }
        footer {
            background-color: #6e78aa; 
        }
        footer img {
            width: 30px;
            height: 30px;
        }
        .table-responsive {
            overflow-x: auto;
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

            <?php
            if (isset($_GET['msg'])) {
                $msg = $_GET['msg'];
                echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Sucesso!</strong> ' . $msg . '
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>';
            }
            ?>

            <div class="mb-3 text-end">
                <a href="add.php" class="btn btn-primary"><i class="fa fa-plus"></i> Adicionar Novo</a>
            </div>

            <div class="table-container">
                <div class="table-responsive">
                    <table class="table table-hover text-center">
                        <thead class="table-dark">
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Modelo</th>
                                <th scope="col">Categoria</th>
                                <th scope="col">Quantidade</th>
                                <th scope="col">Unidade</th>
                                <th scope="col">Descrição</th>
                                <th scope="col">Valor (R$)</th>
                                <th scope="col">Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            include "db_conn.php";
                            $sql = "SELECT * FROM `itens`";
                            $result = mysqli_query($conn, $sql);
                            if ($result->num_rows > 0) {
                                while ($row = mysqli_fetch_assoc($result)) {
                                    echo "<tr>
                                        <td>{$row['id']}</td>
                                        <td>{$row['modelo_item']}</td>
                                        <td>{$row['categoria']}</td>
                                        <td>{$row['quantidade']}</td>
                                        <td>{$row['tipo_item']}</td>
                                        <td>{$row['descricao']}</td>
                                        <td>" . number_format($row['valor'], 2, ',', '.') . "</td>
                                        <td>
                                            <a href='edit.php?id={$row['id']}' class='btn btn-sm btn-warning'><i class='fa-solid fa-pen-to-square'></i></a>
                                            <a href='delete.php?id={$row['id']}' class='btn btn-sm btn-danger'><i class='fa-solid fa-trash'></i></a>
                                        </td>
                                    </tr>";
                                }
                            } else {
                                echo "<tr><td colspan='8' class='text-center'>Nenhum item encontrado.</td></tr>";
                            }
                            ?>
                        </tbody>
                    </table>
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

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>


