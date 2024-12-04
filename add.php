<?php
include "db_conn.php";

if (isset($_POST['submit'])) {
    $modelo = mysqli_real_escape_string($conn, $_POST['modelo_item']);
    $descricao = mysqli_real_escape_string($conn, $_POST['descricao']);
    $quantidade = mysqli_real_escape_string($conn, $_POST['quantidade']);
    $tipo = mysqli_real_escape_string($conn, $_POST['tipo_item']);
    $valor = mysqli_real_escape_string($conn, $_POST['valor']);
    $categoria = mysqli_real_escape_string($conn, $_POST['categoria']);

    $sql = "INSERT INTO `itens` (`id`, `modelo_item`, `descricao`, `valor`, `categoria`, `quantidade`, `tipo_item`) 
            VALUES (NULL, '$modelo', '$descricao', '$valor', '$categoria', '$quantidade', '$tipo')";

    $result = mysqli_query($conn, $sql);

    if ($result) {
        header("Location: index.php?msg=Novo item adicionado com sucesso!");
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

    <title>Adicionar Item</title>

    <style>
        body {
            background-color: #f8f9fa;
        }
        .form-container {
            background-color: #ffffff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }
        .form-label {
            font-weight: bold;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-light justify-content-center fs-3 mb-5"
    style="background-color: #3477eb; color: white;">
        Database Register 
    </nav>

    <div class="container">
        <div class="text-center mb-4">
            <h3>Adicionar Novo Item</h3>
            <p class="text-muted">Preencha as informações para adicionar um novo item ao banco de dados</p>
        </div>
        
        <div class="container d-flex justify-content-center">
            <div class="form-container">
                <form action="" method="post" style="width:100%; min-width: 300px;">
                    <div class="row mb-3">
                        <div class="col">
                            <label class="form-label">Modelo:</label>
                            <input type="text" class="form-control" name="modelo_item" placeholder="e.x.: 110.11.53" required>
                        </div>

                        <div class="col">
                            <label class="form-label">Categoria:</label>
                            <input type="text" class="form-control" name="categoria" placeholder="e.x.: Placa de vídeo" required>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Descrição:</label>
                        <textarea class="form-control" name="descricao" rows="3" placeholder="e.x.: Placa de vídeo RTX 4060 - Alimentação 16pin - Marca: Palit" required></textarea>
                    </div>
                    
                    <div class="row mb-3">
                        <div class="col">
                            <label class="form-label">Quantidade:</label>
                            <input type="number" class="form-control" name="quantidade" placeholder="e.x.: 10" min="1" required>
                        </div>
                        
                        <div class="col">
                            <label class="form-label">Tipo do Item:</label>
                            <select class="form-select" name="tipo_item" required>
                                <option value="" disabled selected>Selecione o tipo</option>
                                <option value="unidade">Unidade</option>
                                <option value="caixa">Caixa</option>
                                <option value="kit">Kit</option>
                                <option value="kit">Par</option>
                                <option value="kit">Pacote</option>

                            </select>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="item-value" class="form-label">Valor do Item (R$):</label>
                        <input type="number" class="form-control" id="item-value" name="valor" placeholder="0,00" step="0.01" min="0" required>
                    </div>

                    <div class="text-center">
                        <button type="submit" class="btn btn-success w-50" name="submit"><i class="fa fa-plus"></i> Adicionar</button>
                        <a href="index.php" class="btn btn-danger w-50 mt-2"><i class="fa fa-times"></i> Cancelar</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
