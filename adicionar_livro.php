<?php
require 'banco.php';
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adicionar Livro</title>
    <style>
        .admin-section {
            max-width: 600px;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        .admin-section h2 {
            text-align: center;
        }
        .admin-section form {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }
        .admin-section form input,
        .admin-section form button {
            padding: 10px;
            font-size: 16px;
        }
        .admin-section form button {
            background-color: #27ae60;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .admin-section form button:hover {
            background-color: #219150;
        }
    </style>
</head>
<body>
    <div class="admin-section">
        <h2>Adicionar Livro</h2>
        <form action="admin_processamento.php" method="post" enctype="multipart/form-data">
            <input type="text" name="nome" placeholder="Nome do Livro" required>
            <input type="number" name="quantidade" placeholder="Quantidade" required>
            <input type="date" name="data_retorno" placeholder="Data de Retorno">
            <input type="file" name="imagem" accept="image/*" required>
            <button type="submit">Salvar</button>
        </form>
    </div>
</body>
</html>
