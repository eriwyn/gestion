<?php $title = 'Edition de la tâche ' . htmlspecialchars($task['name']) ?>

<?php ob_start(); ?>

<p class="previous"><a href="?page=task&id=<?= $task['id'] ?>">Retour</a></p>
<h1 class="modify">Edition de la Tâche <?= htmlspecialchars($task['name']) ?></h1>
<form class="" action="" method="post">
  <ul>
    <li>
      <label for="name">Nom : </label>
      <input type="text" name="name" id="name" value="<?= htmlspecialchars($task['name']) ?>" required>
    </li>
    <li>
      <label for="description">Description : </label>
      <textarea name="description" rows="8" cols="80" required><?= htmlspecialchars($task['detail']) ?></textarea>
    </li>
  </ul>
  <button name="button">Valider</button>
</form>

<?php $content = ob_get_clean() ?>
