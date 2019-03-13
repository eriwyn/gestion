<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="public/css/style.css">
    <title><?= $title ?> - Gestion des heures</title>
  </head>
  <body>
    <header>
      <a class="logo" href="?page=listClients"><img src="public/media/img/logo.svg" alt="logo"></a>
      <nav>
        <?php if ($connection->isConnected()): ?>
          <a class="disconnect" href="?page=disconnect">Déconnexion</a>
        <?php endif; ?>
      </nav>
    </header>
    <main>
      <?= $content ?>
    </main>
    <script src="public/js/jquery-3.3.1.min.js"></script>
    <?php if (isset($script)): ?>
      <script src="public/js/<?= $script ?>.js"></script>
    <?php endif; ?>
    </body>
</html>
