<?php $title = 'Nouvel Achat' ?>

<?php ob_start(); ?>

<p class="previous"><a href="?page=client&id=<?= $_GET['client_id'] ?>">Retour</a></p>
<h1 class="add">Ajouter des heures</h1>
<form class="" action="" method="post">
  <ul>
    <li>
      <label for="name">Nom : </label>
      <input type="text" name="name" id="name" value="" required>
    </li>
    <li>
      <label for="description">Description : </label>
      <textarea name="description" rows="8" cols="80" required></textarea>
    </li>
    <li>
      <label for="hours">Nombre d'heures : </label>
      <input type="number" name="hours" id="hours" value="" min="0" required>
    </li>
    <li>
      <label for="purchaseDate">Date d'achat : </label>
      <input type="date" name="purchaseDate" id="purchaseDate" value="" required>
    </li>
  </ul>
  <button name="button">Valider</button>
</form>

<?php $content = ob_get_clean() ?>
