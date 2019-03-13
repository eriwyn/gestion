<?php $title = 'Achat de ' . htmlspecialchars($purchase['name']) . ' Heures' ?>

<?php ob_start(); ?>

<p class="previous"><a href="?page=client&id=<?= htmlspecialchars($purchase['clientId']) ?>">Retour</a></p>
<section id="purchaseDetail">
  <h1><?= htmlspecialchars($purchase['name']) ?> <a href="?page=editPurchase&id=<?= $purchase['id'] ?>" class="modify">Modifier</a> <a href="?page=removePurchase&id=<?= $purchase['id'] ?>" class="delete">Supprimer</a></h1>
  <p class="subtitle"><time datetime="<?= $purchase['purchaseDate'] ?>">Acheté le <?= $purchase['purchaseDate'] ?></time></p>
  <p><?= htmlspecialchars($purchase['description']) ?></p>
  <p>Achat de <?= $purchase['purchasedHours'] ?> Heures | <?= $purchase['remainingHours'] ?> Heures restantes</p>
</section><!--
--><section class="elementList">
  <?php if ($purchase['remainingHours'] > 0): ?>
    <a href="?page=newTask&client_id=<?= $purchase['clientId'] ?>&purchase_id=<?= $purchase['id'] ?>" class="add">Nouvelle Tâche</a>
  <?php endif; ?>
  <div>
    <h1>Dernières tâches</h1>
    <ul>
      <?php foreach ($tasks as $task): ?>
        <li><a class="<?= $task['status'] ?>Task" href="?page=task&id=<?= $task['id'] ?>"><?= htmlspecialchars($task['name']) ?> | <?= $task['duration'] ?> Heures</a></li>
      <?php endforeach; ?>
    </ul>
  </div>
</section>

<?php $content = ob_get_clean() ?>
