<?php
include_once('templates/header.php');
?>

<div class="container">
    <div class="row">
        <!-- Seção da barra lateral para listar vagas -->
        <div class="col-md-4">
            <h2>Vagas disponíveis</h2>
            <div class="list-group">
            <?php
            $sql = "SELECT vagas.id_vaga, vagas.titulo_vaga, recrutador.nome_recrutador FROM vagas JOIN recrutador ON vagas.id_recrutador = recrutador.id_recrutador WHERE vagas.status_vaga = 'ativa'";

            foreach ($conn->query($sql) as $row) {
                echo '<a href="?id_vaga=' . $row['id_vaga'] . '" class="list-group-item list-group-item-action">' . $row['titulo_vaga'] . ' - ' . $row['nome_recrutador'] . '</a>';
            }
            ?>
            </div>
        </div>

        <!-- Seção principal para mostrar detalhes da vaga -->
        <div class="col-md-8">
            <div class="card">
            <?php
            if (isset($_GET['id_vaga'])) {
                $sql = "SELECT * FROM vagas WHERE id_vaga = ?";
                $stmt = $conn->prepare($sql);
                $stmt->execute([$_GET['id_vaga']]);
                $vaga = $stmt->fetch(PDO::FETCH_ASSOC);
                if ($vaga) {
                    echo '<div class="card-header"><h2>' . $vaga['titulo_vaga'] . '</h2></div>';
                    echo '<div class="card-body">';
                    echo '<p>' . $vaga['descricao_vaga'] . '</p>';
                    echo '<p><strong>Requisitos:</strong> ' . $vaga['requisitos_vaga'] . '</p>';
                    echo '<p><strong>Salário:</strong> ' . $vaga['salario'] . '</p>';
                    echo '<p><strong>Status:</strong> ' . $vaga['status_vaga'] . '</p>';
                    echo '<a href="actions/processa_aplicacao.php?id_vaga=' . $vaga['id_vaga'] . '" class="btn btn-primary">Candidatar-se</a>';
                    echo '</div>';
                }
            } else {
                exibeMensagemSession();
                echo '<div class="card-body">';
                echo '<p>Selecione uma vaga para ver detalhes.</p>';
                echo '</div>';
            }
            ?>
            </div>
        </div>
    </div>
</div>

<?php
include_once('templates/footer.php');
?>
