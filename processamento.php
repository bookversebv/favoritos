<?php
require 'banco.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id_produto = $_POST['id_produto'];
    $quantidade = $_POST['quantidade'];

    $pdo = Banco::conectar();

    // Verificar se o produto já está no carrinho
    $stmt = $pdo->prepare("SELECT * FROM carrinho WHERE id_produto = ?");
    $stmt->execute([$id_produto]);
    $produtoCarrinho = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($produtoCarrinho) {
        // Se o produto já estiver no carrinho, atualizar a quantidade
        $novaQuantidade = $produtoCarrinho['quantidade'] + $quantidade;
        $stmt = $pdo->prepare("UPDATE carrinho SET quantidade = ? WHERE id_produto = ?");
        $stmt->execute([$novaQuantidade, $id_produto]);
    } else {
        // Se o produto não estiver no carrinho, adicionar como novo item
        $stmt = $pdo->prepare("INSERT INTO carrinho (id_produto, quantidade) VALUES (?, ?)");
        $stmt->execute([$id_produto, $quantidade]);
    }

    Banco::desconectar();
    header('Location: carrinho.php');
    exit;
}
?>
