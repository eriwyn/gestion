<?php $title = 'Nouvelle Tâche' ?>

<?php ob_start(); ?>

<p class="previous"><a href="?page=client&id=<?= $_GET['client_id'] ?>">Retour</a></p>
<h1 class="add">Nouvelle Tâche</h1>
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
      <label for="purchase">Achat : </label>
      <select id="purchase" name="purchase">
        <?php foreach ($purchases as $purchase): ?>
          <option value="<?= $purchase['id'] ?>"
            <?php if ($purchase['id'] === $defaultClientId): ?>
              selected="selected"
            <?php endif; ?>
            ><?= htmlspecialchars($purchase['name']) ?></option>
        <?php endforeach; ?>
      </select>
    </li>
  </ul>
  <button name="button">Valider</button>
</form>

<?php $content = ob_get_clean() ?>
