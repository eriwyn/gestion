<?php $title = 'Edition de l\'âchat du ' . $purchase['purchaseDate'] ?>

<?php ob_start(); ?>

<p class="previous"><a href="?page=purchase&id=<?= $purchase['id'] ?>">Retour</a></p>
<h1 class="modify">Edition de l'âchat du <?= $purchase['purchaseDate'] ?></h1>
<form class="" action="" method="post">
  <ul>
    <li>
      <label for="hours">Nombre d'heures : </label>
      <input type="number" name="hours" id="hours" min="0" value="<?= $purchase['hours'] ?>" required>
    </li>
    <li>
      <label for="purchaseDate">Date d'achat : </label>
      <input type="date" name="purchaseDate" id="purchaseDate" value="<?= $purchase['purchaseDate'] ?>" required>
    </li>
  </ul>
  <button name="button">Valider</button>
</form>

<?php $content = ob_get_clean() ?>
