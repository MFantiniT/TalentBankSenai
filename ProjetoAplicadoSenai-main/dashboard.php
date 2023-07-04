<?php include_once('templates/header.php');?>

        <!-- aqui o conteudo principal  -->
        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
          <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Dashboard</h1>
          </div>

          <!-- Painel de estatísticas -->
          <div class="row">
            <div class="col-md-4">
              <div class="card mb-4 shadow-sm">
                <a href="#">
                    <div class="card-body">
                    <h5 class="card-title">Número de candidatos</h5>
                    <p class="card-text">42</p>
                    </div>
                    </a>
              </div>
            </div>
            <!-- Adicione mais estatísticas conforme necessário -->
          </div>

          <!-- Lista das últimas tarefas -->
          <h2>Entrevistas</h2>
          <div class="table-responsive">
            <table class="table table-striped table-sm">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Candidato</th>
                  <th>Status</th>
                  <th>Data da entrevista</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>1</td>
                  <td>João Alles</td>
                  <td>pendente</td>
                  <td>20/06/2023</td>
                </tr>
                <tr>
                  <td>2</td>
                  <td>Roger Terra</td>
                  <td>pendente</td>
                  <td>22/06/2023</td>
                </tr>
                <tr>
                  <td>3</td>
                  <td>Matheus Fantini T</td>
                  <td>pendente</td>
                  <td>30/06/2023</td>
                </tr>
                
              </tbody>
            </table>
          </div>
        </main>
      </div>
    </div>

    <?php include_once('templates/footer.php'); ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Hj8Y6AsQyA7ELTnqzvB5M2gu0tGMJk3o8NX7ckAGWDU7Q48h76zELr7Er1t1wHjG" crossorigin="anonymous"></script>

  </body>
</html>