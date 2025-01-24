<?php
require 'banco.php';

// Recuperar produtos do banco de dados
$pdo = Banco::conectar();
$stmt = $pdo->query("SELECT * FROM produto");
$produto = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Acervo de Livros</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f9;
            color: #333;
        }
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }
        h1 {
            text-align: center;
            margin-bottom: 20px;
        }
        .grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
            gap: 20px;
        }
        .card {
            background: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            padding: 15px;
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        .card img {
            max-width: 100%;
            border-radius: 8px;
            margin-bottom: 10px;
        }
        .card h2 {
            font-size: 18px;
            margin-bottom: 10px;
        }
        .card p {
            font-size: 16px;
            margin-bottom: 15px;
        }
        .card button {
            background-color: #9bd598;
            color: #fff;
            border: none;
            padding: 10px 15px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 14px;
            display: flex;
            align-items: center;
            gap: 5px;
        }
        .card button:hover {
            background-color: #27ae60;
        }
        .card button i {
            font-size: 16px;
        }
        .add-button {
            background-color: #9bd598;
            color: #fff;
            border: none;
            padding: 20px 30px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 18px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 20px 0;
            gap: 10px;
        }
        .add-button:hover {
            background-color: #27ae60;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Acervo de Livros</h1>
        <div class="grid">
            <?php foreach ($produto as $product): ?>
            <div class="card">
                <img width="200" src="<?= $product['imagem']; ?>" alt="<?= $product['nome']; ?>">
                <h2><?= $product['nome']; ?></h2>
                <form action="processamento.php" method="post">
                    <input type="hidden" name="id_produto" value="<?= $product['id']; ?>">
                    <input type="hidden" name="quantidade" value="1">
                    <button type="submit">
                         Adicionar aos Favoritos
                    </button>
                </form>
            </div>
            <?php endforeach; ?>
        </div>
        <button class="add-button" onclick="window.location.href='adicionar_livro.php'">Adicionar Livro</button>
    </div>
</body>
</html>
