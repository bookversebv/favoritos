<?php
require 'banco.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST['nome'];
    $data_retorno = $_POST['data_retorno'];

    // Verificar se um arquivo de imagem foi enviado
    if (isset($_FILES['imagem']) && $_FILES['imagem']['error'] == 0) {
        $imagem = $_FILES['imagem']['name'];
        $imagem_tmp = $_FILES['imagem']['tmp_name'];
        $imagem_destino = 'imagens/' . $imagem;

        // Mover o arquivo de imagem para o destino final
        move_uploaded_file($imagem_tmp, $imagem_destino);
    } else {
        echo "Erro no upload da imagem.";
        exit();
    }

    // Conectar ao banco de dados
    $pdo = Banco::conectar();

    // Inserir os dados no banco de dados
    $stmt = $pdo->prepare("INSERT INTO produto (nome, imagem, data_retorno) VALUES (:nome, :imagem, :data_retorno)");
    $stmt->bindParam(':nome', $nome);
    $stmt->bindParam(':imagem', $imagem_destino);
    $stmt->bindParam(':data_retorno', $data_retorno);

    if ($stmt->execute()) {
        echo "Produto adicionado com sucesso!";
    } else {
        echo "Erro ao adicionar produto.";
    }
}
?>
