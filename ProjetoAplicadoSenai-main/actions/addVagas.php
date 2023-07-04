<?php
    include_once("../conexaoDB.php");
    session_start();
    //Pega os dados do formulário
    $id_usuario = $_SESSION['id_usuario'];
    $titulo_vaga = $_POST['jobTitle'];
    $descricao_vaga = $_POST['jobDescription'];
    $requisitos_vaga = $_POST['requisitos'];
    $salario = $_POST['salario'];
    $status_vaga = "ativa";

    //INSERE A VAGA NO BANCO 
    $sql = "INSERT INTO vagas(titulo_vaga, descricao_vaga, requisitos_vaga, salario, status_vaga, id_recrutador) VALUES (:titulo, :descricao, :requisitos, :salario, :status_vaga ,:id_recrutador)";

    $stmt = $conn->prepare($sql);
    $stmt->bindParam(":titulo", $titulo_vaga);
    $stmt->bindParam(":descricao", $descricao_vaga);
    $stmt->bindParam(":requisitos", $requisitos);
    $stmt->bindParam(":salario", $salario);
    $stmt->bindParam(":status_vaga", $status_vaga);
    $stmt->bindParam(":id_recrutador", $id_usuario);
    $stmt->execute();
    header("location: ../minhasVagas.php");

?>