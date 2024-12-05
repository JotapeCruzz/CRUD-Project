<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Database Register</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css" integrity="sha512-5Hs3dF2AEPkpNAR7UiOHba+lRSJNeM2ECkwxUIxC1Q/FLycGTbNapWXB4pP889k5T5Ju8fs4b1P5z/iB4nMfSQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <style>
        body {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            margin: 0;
            background-color: #f8f9fa;
        }
        main {
            flex: 1;
        }
        .logo {
            width: 50px;
            height: auto;
        }
        .header-container {
            background-color: #3477eb;
            color: white;
        }
        .descricao {
            margin-top: 20px;
            line-height: 1.8;
        }
        .botoes a {
            margin: 5px;
        }
        footer {
            background-color: #6e78aa;
            color: white;
        }
        footer img {
            width: 30px;
            height: 30px;
        }
    </style>
</head>
<body>
    <header class="header-container py-3" style="background-color: #3477eb; color: white;">
        <div class="container d-flex justify-content-end align-items-center">
            <a href="login.php" class="btn btn-light me-2">Login</a>
            <a href="register.php" class="btn btn-outline-light">Cadastre-se</a>
        </div>
    </header>

    <main>
        <div class="container text-center">
            <h1 class="my-4">Bem-vindo ao Database Register</h1>
            <div class="descricao">
                <img src="images/logo.png" alt="">
                <p>
                    O <strong>Database Register</strong> é um sistema desenvolvido para <strong>otimizar o gerenciamento de estoques</strong>. 
                    Ele proporciona maior eficiência, controle e organização para empresas de todos os tamanhos.
                </p>
                <p>
                    Nosso objetivo é facilitar a administração de produtos, permitindo o registro, acompanhamento e atualização de informações de forma simples e acessível.
                </p>
                <p>
                    Gerencie seus registros com <strong>facilidade</strong> e <strong>eficiência</strong>.
                </p>
            </div>
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

    <!-- Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
