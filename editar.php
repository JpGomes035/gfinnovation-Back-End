<?php
include_once 'iniciar_sessao.php';
include_once 'conexao.php';
include_once('head.php');
$id = $_GET['id'];

$sql = "SELECT * FROM investimentos WHERE Id = $id";
$retorno = mysqli_query($conexao, $sql);

if (mysqli_num_rows($retorno) == 0) {
    echo "Investimento não encontrado.";
    exit();
}

$investimento = mysqli_fetch_array($retorno, MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Editar Investimento</title>
    <style>
        body {
            background: linear-gradient(to bottom, #2a9d8f, #264653);
            color: black;
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        .form-container {
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 600px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            font-weight: bold;
            display: block;
            margin-bottom: 5px;
        }

        .form-group input[type="text"],
        .form-group input[type="number"],
        .form-group input[type="file"],
        .form-group select {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        button[type="submit"] {
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            display: block;
            width: 100%;
            margin-top: 10px;
        }

        button[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>

<body>
    <div class="form-container">
        <h2>Editar Investimento</h2>
        <?php if (isset($_GET['erro'])): ?>
            <div style="color: red; background: #ffe5e5; padding: 10px; border-radius: 5px; margin-bottom: 15px;">
                <?= htmlspecialchars($_GET['erro']) ?>
            </div>
        <?php endif; ?>
        <form action="atualizar.php" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="Id" value="<?= $investimento['Id'] ?>">

            <div class="form-group">
                <label for="Numero">Número do investimento:</label>
                <input type="text" id="Numero" name="Numero" value="<?= $investimento['Numero'] ?>" required>
            </div>

            <div class="form-group">
                <label for="Nome">Nome do investimento:</label>
                <input type="text" id="Nome" name="Nome" value="<?= $investimento['Nome'] ?>" required>
            </div>

            <div class="form-group">
                <label for="categoria">Categoria</label>
                <select class="form-control" id="categoria" name="categoria" required>
                    <?php
                    // puxar todas as categorias cadastradas
                    $sqlCategoria = "SELECT * FROM categoria ORDER BY Nome ASC";
                    $retornoCategoria = mysqli_query($conexao, $sqlCategoria);
                    while ($array = mysqli_fetch_array($retornoCategoria, MYSQLI_ASSOC)) {
                        $idCategoria = $array["IdCategoria"];
                        $nomeCategoria = $array["Nome"];
                        // Verifica se a categoria atual é a do investimento
                        $selected = ($investimento['Categoria'] == $nomeCategoria) ? 'selected' : '';
                    ?>
                        <option value="<?= $nomeCategoria ?>" <?= $selected ?>><?= $nomeCategoria ?></option>
                    <?php } ?>
                </select>
            </div>

            <div class="form-group">
                <label for="preco">Valor:</label>
                <input type="number" id="preco" name="preco" value="<?= $investimento['preco'] ?>" step="0.01" required>
            </div>
            <input type="date" class="form-control" id="data_investimento" name="data_investimento" value="<?= $investimento['data_investimento'] ?>" required max="<?= date('Y-m-d') ?>">
            <button type="submit">Atualizar Investimento</button>
        </form>
    </div>
</body>
</html>