<?php $title = 'Connexion' ?>

<?php ob_start(); ?>

<?php if ($wrongLogin): ?>
  <p class="errorMessage">Erreur dans le nom d'utilisateur ou dans le mot de passe.</p>
<?php endif; ?>

<form class="login" action="" method="post">
  <ul>
    <li>
      <label for="username">Nom d'utilisateur</label>
      <input type="text" name="username" id="username" value="" placeholder="identifiant">
    </li>
    <li>
      <label for="password">Mot de passe</label>
      <input type="password" name="password" id="password" value="" placeholder="mot de passe">
    </li>
  </ul>
  <button name="button">Connexion</button>
</form>

<?php $content = ob_get_clean() ?>
