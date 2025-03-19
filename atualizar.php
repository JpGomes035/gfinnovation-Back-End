<?php
include_once 'conexao.php';
include_once 'iniciar_sessao.php';

// Verifica se o ID foi enviado
if (!isset($_POST['Id']) || empty($_POST['Id'])) {
    header("Location: editar.php?erro=ID inválido");
    exit;
}

$id = intval($_POST['Id']); // Garante que seja um número inteiro 
$categoria = mysqli_real_escape_string($conexao, trim($_POST['categoria'])); // Tipo investimento
$nome = mysqli_real_escape_string($conexao, trim($_POST['Nome'])); // Nome investimento
$numero = mysqli_real_escape_string($conexao, trim($_POST['Numero'])); //Numero do investimento
$preco = $_POST['preco'];
$data_investimento = mysqli_real_escape_string($conexao, trim($_POST['data_investimento'])); //Data do investimento

// Verifica se os campos obrigatórios estão preenchidos
if (empty($nome) || empty($numero) || empty($categoria) || empty($data_investimento)) {
    header("Location: editar.php?id=$id&erro=Todos os campos são obrigatórios");
    exit;
}

// Confirma se a data informada não é no futuro
$hoje = date('Y-m-d');
if ($data_investimento > $hoje) {
    header("Location: editar.php?id=$id&erro=A data do investimento não pode ser no futuro");
    exit;
}

// Realiza o update no banco de dados
$sql = "UPDATE investimentos 
        SET Nome = '$nome', 
            Categoria = '$categoria', 
            Numero = '$numero', 
            preco = '$preco', 
            data_investimento = '$data_investimento' 
        WHERE Id = $id";

$update = mysqli_query($conexao, $sql);

if ($update) {
    header("Location: listar.php?atualizado=$id");
    exit;
} else {
    header("Location: editar.php?id=$id&erro=Erro ao atualizar o investimento: " . mysqli_error($conexao));
    exit;
}
?>
