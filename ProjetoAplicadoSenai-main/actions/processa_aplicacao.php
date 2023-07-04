<?php
session_start();
require_once('../conexaoDB.php');

// Verificando se o usuário está logado e se os campos necessários foram enviados
if(isset($_SESSION['id_usuario']) && isset($_GET['id_vaga'])) {
    $id_usuario = $_SESSION['id_usuario'];
    $id_vaga = $_GET['id_vaga'];
    
    try {
        // Consulta SQL para inserir nova aplicação
        $sql = "INSERT INTO aplicacoes (id_candidato, id_vaga, data_aplicacao, status_aplicacao) VALUES (:id_candidato, :id_vaga, NOW(), 'aplicado')";
        
        $stmt = $conn->prepare($sql);

        $stmt->execute([
            'id_candidato' => $id_usuario, 
            'id_vaga' => $id_vaga
        ]);

        // Definindo mensagem de sucesso e redirecionando para a página de vagas
        $_SESSION['mensagem'] = "Aplicação feita com sucesso!";
        header('Location: ../vagas.php');
    } catch(PDOException $e) {
        // Tratando erro
        echo 'Erro: ' . $e->getMessage();
    }
} else {
    // Redirecionando para a página de login se o usuário não estiver logado ou os dados necessários não foram enviados
    header('Location: ../login.php');
}
?>
