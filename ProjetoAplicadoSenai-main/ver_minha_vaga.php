<?php
include_once('templates/header.php');
$id_vaga = $_GET['id_vaga'];
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
    <?= exibeMensagemSession(); ?>
        <h1 class="h2">Editar Vaga</h1>
    </div>

    <form action="actions/update_vagas.php" method="POST">
        <div class="my-3">
            <label for="titulo_vaga">Título da Vaga</label>
            <input type="text" id="titulo_vaga" name="titulo_vaga" class="form-control" value="<?= $vaga['titulo_vaga'] ?>" required>
        </div>

        <div class="my-3">
            <label for="descricao_vaga">Descrição da Vaga</label>
            <textarea id="descricao_vaga" name="descricao_vaga" class="form-control" rows="3" required><?= $vaga['descricao_vaga'] ?></textarea>
        </div>

        <div class="my-3">
            <label for="requisitos_vaga">Requisitos da Vaga</label>
            <textarea id="requisitos_vaga" name="requisitos_vaga" class="form-control" rows="3" required><?= $vaga['requisitos_vaga'] ?></textarea>
        </div>

        <div class="my-3">
            <label for="salario">Salário</label>
            <input type="text" id="salario" name="salario" class="form-control" value="<?= $vaga['salario'] ?>" >
        </div>

        <div class="my-3">
            <label for="status_vaga">Status da Vaga</label>
            <input type="text" id="status_vaga" name="status_vaga" class="form-control" value="<?= $vaga['status_vaga'] ?>" required>
        </div>
        <input type="hidden" name="id_vaga" value="<?= $id_vaga ?>">


        <button type="submit" class="btn btn-primary">Atualizar Vaga</button>
    </form>
</main>

<?php include_once('templates/footer.php'); ?>