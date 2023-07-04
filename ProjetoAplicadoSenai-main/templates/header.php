<?php
  include_once('helpers/url.php');
  include_once('functions.php');
  include_once('conexaoDB.php');
  // verifica se o usuário está logado
  session_start();
  if (!isset($_SESSION['id_usuario'])) {
  // o usuário não está logado, redireciona para a página de login
  header("Location: ./login.php");
  exit; // garante que o resto do script não será executado
}
?>

<!doctype html>
<html lang="pt-br" style="position: relative; min-height: 100%;">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <title>BankFellas</title>
  </head>
  <body style="padding-bottom: 70px;">
    <!-- Barra de navegação -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <div class="container-fluid">
        <?php if($_SESSION['id_usuario']<=2):?>
          <a class="navbar-brand" href="dashboard.php">BankFellas</a>
        <?php else: ?>
          <a class="navbar-brand" href="vagas.php">BankFellas</a>
        <?php endif; ?>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link" href="#">Olá <?=$_SESSION['nome_usuario']?></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Perfil</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?=$BASE_URL?>actions/logout.php">Sair</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <?php if($_SESSION['id_usuario']<=2):?>
    <!-- Conteúdo principal -->
    <div class="container-fluid" style="padding-bottom: 70px;">
      <div class="row">
        <!-- Menu lateral -->
        <nav class="col-md-2 d-none d-md-block bg-light sidebar">
          <div class="sidebar-sticky">
            <ul class="nav flex-column">
              <li class="nav-item">
                <a class="nav-link active" href="dashboard.php">
                  Dashboard
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="minhasVagas.php">
                  Minhas Vagas
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="candidatos.php">
                  Meus Candidatos
                </a>
              </li>
              <!-- Aqui podemos adicionar mais páginas a barra de navegação -->
            </ul>
          </div>
        </nav>
        <?php else: ?>
              <!-- Conteúdo principal -->
    <div class="container-fluid" style="padding-bottom: 70px;">
      <div class="row">
        <!-- Menu lateral -->
        <nav class="col-md-2 d-none d-md-block bg-light sidebar">
          <div class="sidebar-sticky">
            <ul class="nav flex-column">

              <li class="nav-item">
                <a class="nav-link" href="vagas.php">
                  Vagas
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="candidatura.php">
                  Candidaturas
                </a>
              </li>
              <!-- Aqui podemos adicionar mais páginas a barra de navegação -->
            </ul>
          </div>
        </nav>
        <?php endif; ?>