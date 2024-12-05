<?php
include "db_conn.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $firstName = mysqli_real_escape_string($conn, $_POST['primeiro_nome']);
    $secondName = mysqli_real_escape_string($conn, $_POST['segundo_nome']);
    $dataNasc = mysqli_real_escape_string($conn, $_POST['data_nasc']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $senha = mysqli_real_escape_string($conn, $_POST['senha']);
    $genero = mysqli_real_escape_string($conn, $_POST['genero']);
    $telefone = mysqli_real_escape_string($conn, $_POST['telefone']);

    $senhaHash = password_hash($senha, PASSWORD_BCRYPT);

    $sql = "INSERT INTO `usuario` (`primeiro_nome`, `segundo_nome`, `data_nasc`, `email`, `senha`, `genero`, `telefone`) 
            VALUES ('$firstName', '$secondName', '$dataNasc', '$email', '$senhaHash', '$genero', '$telefone')";

    if (mysqli_query($conn, $sql)) {
        $successMessage = "Cadastro realizado com sucesso!";
        header("Location: list.php");
        exit();
    } else {
        $errorMessage = "Erro ao cadastrar: " . mysqli_error($conn);
    }
}
?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Database Register</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }
        main {
            flex: 1;
        }
        .card {
            max-width: 600px;
            margin: auto;
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
<body class="bg-light">

    <main class="container d-flex justify-content-center align-items-center">
        <div class="card p-4 shadow-lg">
            <h1 class="text-center mb-4">Cadastre-se</h1>

            <?php if (!empty($successMessage)): ?>
                <div class="alert alert-success">
                    <?= htmlspecialchars($successMessage) ?>
                </div>
            <?php elseif (!empty($errorMessage)): ?>
                <div class="alert alert-danger">
                    <?= htmlspecialchars($errorMessage) ?>
                </div>
            <?php endif; ?>

            <form action="" method="POST">
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="primeiro-nome" class="form-label">Primeiro Nome:</label>
                        <input type="text" class="form-control" name="primeiro_nome" placeholder="Digite seu primeiro nome" required>
                    </div>
                    <div class="col-md-6">
                        <label for="segundo-nome" class="form-label">Segundo Nome:</label>
                        <input type="text" class="form-control" name="segundo_nome" placeholder="Digite seu segundo nome" required>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="data-nasc" class="form-label">Data de Nascimento:</label>
                    <input type="date" class="form-control" name="data_nasc" required>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email:</label>
                    <input type="email" class="form-control" name="email" placeholder="Digite seu email" required>
                </div>
                <div class="mb-3">
                    <label for="senha" class="form-label">Senha:</label>
                    <input type="password" class="form-control" name="senha" placeholder="Digite sua senha" required>
                </div>
                <div class="mb-3">
                    <label for="telefone" class="form-label">Telefone:</label>
                    <input type="text" class="form-control" name="telefone" placeholder="Digite seu número de telefone" required>
                </div>
                <div class="mb-3">
                    <label for="genero" class="form-label">Gênero:</label>
                    <select class="form-select" name="genero" required>
                        <option value="" disabled selected>Selecione seu gênero</option>
                        <option value="masculino">Masculino</option>
                        <option value="feminino">Feminino</option>
                        <option value="nao-informar">Prefiro não informar</option>
                        <option value="outro">Outro</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary w-100">Cadastre-se</button>
            </form>
            <a href="index.php" class="d-block text-center mt-3">Voltar</a>
        </div>
    </main>

    <footer class="bgtext-dark text-center py-4">
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>


