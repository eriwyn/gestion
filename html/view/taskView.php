<?php $title = htmlspecialchars($task['name']) ?>

<?php ob_start(); ?>

<p class="previous"><a href="?page=client&id=<?= $clientId ?>">Retour</a></p>
<section id="clientDetail">
  <h1><?= htmlspecialchars($task['name']) ?> <a href="?page=editTask&id=<?= $task['id'] ?>" class="modify">Modifier</a> <a href="?page=removeTask&id=<?= $task['id'] ?>" class="delete">Supprimer</a></h1>
  <p class="subtitle"><time datetime="<?= $task['beginningDate'] ?>">Créée le <?= $task['creationDate'] ?></time> | <?= $task['duration'] ?> Heures</p>
  <p><?= $task['detail'] ?></p>
</section>
<section id="taskMenu">

  <?php if ($task['status'] == 'paused'): ?>
    <a href="?page=task&id=<?= $task['id'] ?>&action=play" class="play">Continuer</a>
  <?php endif; ?>

  <?php if ($task['status'] == 'pending'): ?>
    <a href="?page=task&id=<?= $task['id'] ?>&action=pause" class="pause">Arrêter</a>
  <?php endif; ?>

  <?php if ($task['status'] != 'ended'): ?>
    <a href="?page=task&id=<?= $task['id'] ?>&action=end" class="end">Fin de tâche</a>
  <?php else: ?>
    <p>La tâche est terminée.</p>
    <a href="?page=task&id=<?= $task['id'] ?>&action=pause" class="play">Reprendre</a>
  <?php endif; ?>
</section>

<?php $content = ob_get_clean() ?>
