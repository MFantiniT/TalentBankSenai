<?php
include_once("../conexaoDB.php");

try {
    session_start();
    // define a consulta SQL
    $sql = 'UPDATE vagas SET titulo_vaga = :titulo_vaga, descricao_vaga = :descricao_vaga, requisitos_vaga = :requisitos_vaga, salario = :salario, status_vaga = :status_vaga WHERE id_vaga = :id_vaga';

    // prepara a consulta SQL
    $stmt = $conn->prepare($sql);

    // substitui os parâmetros no SQL pelos valores vindos do formulário
    $stmt->bindParam(':titulo_vaga', $_POST['titulo_vaga']);
    $stmt->bindParam(':descricao_vaga', $_POST['descricao_vaga']);
    $stmt->bindParam(':requisitos_vaga', $_POST['requisitos_vaga']);
    $stmt->bindParam(':salario', $_POST['salario']);
    $stmt->bindParam(':status_vaga', $_POST['status_vaga']);
    $stmt->bindParam(':id_vaga', $_POST['id_vaga']);

    // executa a consulta
    $stmt->execute();
    $_SESSION['mensagem']= " Alterações salvas!! ";
    // redireciona para a página de vagas após atualizar a vaga
    header('Location: ../ver_minha_vaga.php?id_vaga='.$_POST['id_vaga']);
} catch (PDOException $e) {
    echo 'Erro ao conectar com o banco de dados: ' . $e->getMessage();
    exit;
}
?>
