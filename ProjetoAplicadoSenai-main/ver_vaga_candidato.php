<?php
include_once('templates/header.php');
$id_vaga = $_GET['id_vaga'];
// conecta ao banco de dados e busca as informações
try {
    // define a consulta
    $sql = 'SELECT titulo_vaga, descricao_vaga, requisitos_vaga, salario, status_vaga FROM vagas WHERE id_vaga = :id_vaga';

    // prepara a consulta
    $stmt = $conn->prepare($sql);

    // substitui :id_vaga pelo id da vaga que você quer exibir
    $stmt->bindParam(':id_vaga', $id_vaga);

    // executa a consulta
    $stmt->execute();

    // busca o resultado
    $vaga = $stmt->fetch(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo 'Erro ao conectar com o banco de dados: ' . $e->getMessage();
    exit;
}
?>

<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2"><?= $vaga['titulo_vaga'] ?></h1>
    </div>

    <div class="my-3">
        <h4>Descrição da Vaga</h4>
        <p><?= $vaga['descricao_vaga'] ?></p>
    </div>

    <div class="my-3">
        <h4>Requisitos da Vaga</h4>
        <p><?= $vaga['requisitos_vaga'] ?></p>
    </div>

    <div class="my-3">
        <h4>Salário</h4>
        <p><?= $vaga['salario'] ?></p>
    </div>

    <div class="my-3">
        <h4>Status da Vaga</h4>
        <p><?= $vaga['status_vaga'] ?></p>
    </div>
</main>

<?php include_once('templates/footer.php'); ?>
