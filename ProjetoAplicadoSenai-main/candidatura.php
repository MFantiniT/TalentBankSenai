<?php
include_once('conexaoDB.php');
?>
<?php
include_once('templates/header.php');



$id_usuario = $_SESSION['id_usuario'];  // substitua isso pelo id do usuário logado

try {
    

    $sql = "SELECT aplicacoes.id_aplicacao, vagas.titulo_vaga, vagas.descricao_vaga, aplicacoes.data_aplicacao 
            FROM aplicacoes
            INNER JOIN vagas ON aplicacoes.id_vaga = vagas.id_vaga
            WHERE aplicacoes.id_candidato = :id_candidato";

    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id_candidato', $id_usuario);
    $stmt->execute();

    $candidaturas = $stmt->fetchAll();

} catch (PDOException $pe) {
    die("Could not connect to the database $dbName :" . $pe->getMessage());
}

?>


<div class="container">
        <h1 class="mt-4 mb-4">Minhas Candidaturas</h1>
        <?php
            if(count($candidaturas) > 0) {
                echo "<table class='table'>";
                echo "<thead><tr><th>ID da Aplicação</th><th>Título da Vaga</th><th>Descrição</th><th>Data da Aplicação</th></tr></thead>";
                echo "<tbody>";
                foreach($candidaturas as $candidatura) {
                    echo "<tr>";
                    echo "<td>".$candidatura['id_aplicacao']."</td>";
                    echo "<td>".$candidatura['titulo_vaga']."</td>";
                    echo "<td>".$candidatura['descricao_vaga']."</td>";
                    echo "<td>".$candidatura['data_aplicacao']."</td>";
                    echo "</tr>";
                }
                echo "</tbody>";
                echo "</table>";
            } else {
                echo "<p>Você ainda não se candidatou a nenhuma vaga.</p>";
            }
        ?>
    </div>
</body>
</html>

    









<?php
include_once('templates/header.php')
?>