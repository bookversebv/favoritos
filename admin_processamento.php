<?php
require 'banco.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = $_POST['nome'];
    $quantidade = $_POST['quantidade'];
    $data_retorno = $_POST['data_retorno'];
    $imagem = $_FILES['imagem'];

    $pdo = Banco::conectar();

    if ($imagem['error'] == UPLOAD_ERR_OK) {
        $imagemPath = 'imagens/' . basename($imagem['name']);
        move_uploaded_file($imagem['tmp_name'], $imagemPath);

        $sql = "INSERT INTO produto (nome, quantidade, data_retorno, imagem) VALUES (?, ?, ?, ?)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$nome, $quantidade, $data_retorno, $imagemPath]);
    } else {
        // Handle image upload error
        echo "Erro no upload da imagem.";
        exit;
    }

    Banco::desconectar();
    header('Location: index.php');
    exit;
}
?>
