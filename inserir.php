<?php
include_once 'iniciar_sessao.php';
include_once 'conexao.php';

$Numero = trim($_POST["Numero"]); //Numero do investimento
$Nome = trim($_POST["Nome"]); //Nome do investimento
$preco = trim($_POST["preco"]); // Valor inserido
$categoria = trim($_POST["categoria"]); // Categoria inserida
$data_investimento = $_POST["data_investimento"]; // Data informada no action
$data_cadastro = date('Y-m-d H:i:s'); // Obtém a data e hora atuais

// Confirmar se a data informada não é no futuro
$hoje = date('Y-m-d');
if ($data_investimento > $hoje) {
    echo "Erro: A data do investimento não pode ser no futuro.";
    exit;
}

$sql = "INSERT INTO `investimentos` (`Categoria`, `Nome`, `preco`, `Numero`, `deletado`, `data_cadastro`, `data_investimento`) 
VALUES ('$categoria', '$Nome', '$preco', '$Numero', 'N', '$data_cadastro', '$data_investimento')";

$inserir = mysqli_query($conexao, $sql);

if ($inserir) {
    header("Location: listar.php?cadastrado=1");
} else {
    echo "Erro ao cadastrar investimento.";
}
?>
