<?php
 include_once('../conexaoDB.php');
 include_once('../helpers/url.php');




 $nome = $_POST['nome'];
 $sobrenome = $_POST['sobrenome'];
 $email = $_POST['email'];
 $senha = password_hash($_POST['senha'], PASSWORD_DEFAULT);
 session_start();
 try {   
    $sql = "INSERT INTO usuario(nome_usuario, sobrenome_usuario, senha_hash, email) VALUES (:nome, :sobrenome, :senha, :email)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(":nome", $nome);
    $stmt->bindParam(":sobrenome", $sobrenome);
    $stmt->bindParam(":senha", $senha);
    $stmt->bindParam(":email", $email);
    $stmt->execute();
    header("Location: ../login.php");
    $_SESSION['mensagem']= "Cadastro concluído com sucesso!";
 } catch (PDOException $e) {
    if ($e->errorInfo[1] == 1062){
        $_SESSION['mensagem']= "Este email já esta cadastrado";
        
        header("Location: ../cadastrar.php");
        exit();
    } else {
        echo "Erro: " . $e->getMessage();
    }
}


?>