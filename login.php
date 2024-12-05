<?php
session_start();
include "db_conn.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $senha = $_POST['senha'];

    $sql = "SELECT * FROM `usuario` WHERE `email` = '$email'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) === 1) {
        $user = mysqli_fetch_assoc($result);

        
        if (password_verify($senha, $user['senha'])) {
            
            $_SESSION['id'] = $user['id'];
            $_SESSION['primeiro_nome'] = $user['primeiro_nome'];
            $_SESSION['email'] = $user['email'];

            header("Location: dashboard.php");
            exit();
        } else {
            $errorMessage = "Senha incorreta.";
        }
    } else {
        $errorMessage = "Usuário não encontrado.";
    }
}
?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
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
            max-width: 400px;
            margin: 20px auto;
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

    <main class="d-flex justify-content-center align-items-center">
        <div class="card p-4 shadow-lg">
            <h1 class="text-center mb-4">Login</h1>

            
            <?php if (!empty($errorMessage)): ?>
                <div class="alert alert-danger">
                    <?= htmlspecialchars($errorMessage) ?>
                </div>
            <?php endif; ?>

            
            <form action="" method="POST">
                <div class="mb-3">
                    <label for="email" class="form-label">Email:</label>
                    <input type="email" class="form-control" name="email" placeholder="Digite seu email" required>
                </div>
                <div class="mb-3">
                    <label for="senha" class="form-label">Senha:</label>
                    <input type="password" class="form-control" name="senha" placeholder="Digite sua senha" required>
                </div>
                <button type="submit" class="btn btn-primary w-100">Entrar</button>
            </form>
            <a href="register.php" class="d-block text-center mt-3">Cadastre-se</a>
        </div>
    </main>

    <footer class="text-dark text-center py-4">
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

