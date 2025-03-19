<?php
include_once 'iniciar_sessao.php';
include_once 'head.php';
include_once 'conexao.php';
?>
<!DOCTYPE html>
<html lang="pt-br">

<title>Cadastro de investimento</title>
<style>
    body {
        background: linear-gradient(to bottom, #4daaaa, #a7a4a4);
        color: black;
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 20px;
        min-height: 100vh;
        box-sizing: border-box;
        display: flex;
        flex-direction: column;
        justify-content: center;
        font-weight: bold;
    }

    h1 {
        font-size: 24px;
        font-weight: bold;
    }

    p {
        font-size: 16px;
        font-weight: bold;
        line-height: 1.6;
    }
</style>
<body>
    <div style="padding:20px 0;max-width:800px" class="container">
        <br>
        <h4 style="padding:0 0 20px 0;margin-bottom:35px;" class="border-bottom">Cadastro de Investimento</h4>
        <form action="inserir.php" method="POST" enctype="multipart/form-data">

            <div class="form-group">
                <label for="Numero">Número de pesquisa do investimento:</label>
                <input type="text" class="form-control" id="Numero" placeholder="Digite o número do investimento" name="Numero" required autocomplete="off">
            </div>

            <div class="form-group">
                <label for="Nome">Nome do investimento:</label>
                <input type="text" class="form-control" id="Nome" name="Nome" placeholder="Digite o nome do investimento" autocomplete="off" required>
            </div>

            <div class="form-group">
                <label for="preco">Valor do Investimento:</label>
                <input type="number" step="0.01" min="0.01" class="form-control" id="preco" name="preco" 
                placeholder="Digite o valor do investimento (Usar . para diferenciar os valores ex(150.99))" autocomplete="off" required>
            </div>

            <div class="form-group">
                <label for="categoria">Categoria:</label>
                <select class="form-control" id="categoria" name="categoria" required>
                    <?php
                    // puxar todas as categorias cadastradas
                    $sqlCategoria = "SELECT * FROM categoria ORDER BY Nome ASC";
                    $retornoCategoria = mysqli_query($conexao, $sqlCategoria);
                    while ($array = mysqli_fetch_array($retornoCategoria, MYSQLI_ASSOC)) {
                        $idCategoria = $array["IdCategoria"];
                        $nomeCategoria = $array["Nome"];
                    ?>
                        <option><?= $nomeCategoria ?></option>
                    <?php } ?>
                </select>
            </div>        
            <div class="form-group">
    <label for="data_investimento">Data do Investimento:</label>
    <input type="date" class="form-control" id="data_investimento" name="data_investimento" required max="<?= date('Y-m-d') ?>">
    </div>    
            <button type="submit" class="btn-enviar btn btn-success btn-sm btn-block">Cadastrar <i class="fa fa-plus" aria-hidden="true"></i></button>
            <a href="listar.php" class="btn-enviar btn btn-success btn-sm btn-block">Listar produtos</a>
        </form>
    </div>

</body>

</html>