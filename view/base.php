<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Portail de notre magnifique residance pour enfant tres heureux de leur sort de merde.">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <base href="http://localhost/orphanage/" target="_blank">
    <link rel="stylesheet" href="css/style.css">
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script defer src="js/main.js"></script>
    <title>Orphelinat</title>
</head>
<body>

<?php 
  session_start();

?>
<header></header>
    
<nav class="navbar navbar-expand-lg bg-body-tertiary sticky-top">
  <div class="container-fluid">
    <a class="navbar-brand" href="view/home.php">Accueil</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <?php if( isset($_SESSION['role']) && $_SESSION['role'] >= Role::CUSTOMER->value) {?>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Enfants
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item"  href="view/children/index_children.php">Liste des enfants</a></li>
            <?php if ($_SESSION['role'] >= Role::SECRETARY->value) {?>
              <li><a class="dropdown-item"  href="view/children/create_children.php">Ajouter un enfant</a></li>
            <?php }?>
          </ul>
        </li>
        <?php if ($_SESSION['role'] == Role::ADMIN->value) {?>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Utilisateurs
          </a> 
          <ul class="dropdown-menu">
            <li><a class="dropdown-item"  href="view/users/index_users.php">Liste des utilisateurs</a></li>
            <li><a class="dropdown-item"  href="view/users/create_users.php">Ajouter un utilisateur</a></li>
          </ul>
        </li>
          <?php }?>
        <?php }?>
        <?php if ( !isset($_SESSION['name']) ){?>
        <li class="nav-item">
        <a class="nav-link" href="view/users/login.php">Connexion</a>
      </li>
      <?php }else { ?>
        <li class="nav-item">
        <a class="nav-link" href="controller/logout.php">Déconnexion</a>
      </li>
      <?php } ?>
      </ul>
      <form class="d-flex" role="search">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
    </div>
  </div>
</nav>
