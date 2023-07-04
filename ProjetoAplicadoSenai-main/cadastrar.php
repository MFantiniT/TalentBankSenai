<?php
 include_once('helpers/url.php');
 include_once('functions.php');
?>
<!doctype html>
<html lang="pt-br">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <title>Login - Banco de Talentos</title>
  </head>
  <body>
    <div class="container py-5">
      <div class="row justify-content-center">
        <div class="col-md-6">
          <h1 class="text-center mb-4">Banco de Talentos</h1>
          <div class="card">
            <div class="card-body">
              <h5 class="card-title text-center mb-4">Cadastrar-se</h5>
              <form action="<?=$BASE_URL?>actions/cadastro.php" method="post">
              <?= exibeMensagemSession() ?>
                <div class="mb-3">
                  <label for="Nome" class="form-label">Nome</label>
                  <input type="name" name=nome class="form-control" id="Nome" aria-describedby="emailHelp" required>
                </div>
                <div class="mb-3">
                  <label for="sobrenome" class="form-label">Sobrenome</label>
                  <input type="name" name=sobrenome class="form-control" id="sobrenome" aria-describedby="emailHelp" required>
                </div>
                <div class="mb-3">
                
                  <label for="email" class="form-label">Endereço de email</label>
                  <input type="email" name=email class="form-control" id="email" aria-describedby="emailHelp" required>
                </div>
                <div class="mb-3">
                  <label for="senha" class="form-label">Senha</label>
                  <input type="password" name=senha class="form-control" id="senha" required>
                </div>
                <div class="mb-3">
                  <label for="confirmsenha" class="form-label">Confirme sua senha</label>
                  <input type="password" name=confirmsenha class="form-control" id="confirmsenha" required>
                </div>
                <button type="submit" class="btn btn-primary w-100 mt-2">Cadastrar</button>
                <a class="btn btn-primary w-100 mt-2" href="<?=$BASE_URL?>login.php">Voltar</a>
              </form>

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <?php  include_once("templates/footer.php") ?>
    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Hj8Y6AsQyA7ELTnqzvB5M2gu0tGMJk3o8NX7ckAGWDU7Q48h76zELr7Er1t1wHjG" crossorigin="anonymous"></script>

  </body>
</html>
