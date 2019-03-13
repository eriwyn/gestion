<?php $title = htmlspecialchars($client['name']) ?>

<?php ob_start(); ?>

<p class="previous"><a href="?page=listClients">Retour</a></p>

<section id="clientDetail">
  <h1><?= htmlspecialchars($client['name']) ?> <a href="?page=editClient&id=<?= $client['id'] ?>" class="modify">Modifier</a> <a href="?page=removeClient&id=<?= $client['id'] ?>" class="delete">Supprimer</a></h1>
  <address>
    <?= htmlspecialchars($client['address']) ?><br>
    <?= htmlspecialchars($client['postalCode']) ?> <?= htmlspecialchars($client['city']) ?><br>
    <?= htmlspecialchars($client['country']) ?><br>
    <a href="<?= htmlspecialchars($client['mail']) ?>"><?= htmlspecialchars($client['mail']) ?></a><br>
    <a href="tel:<?= htmlspecialchars($client['tel']) ?>"><?= htmlspecialchars($client['tel']) ?></a>
  </address>
</section>
<section class="elementList">
  <?php if (count($purchases)): ?>
    <a href="?page=newTask&client_id=<?= $client['id'] ?>" class="add">Nouvelle Tâche</a>
  <?php endif; ?>
  <div>
    <h1>Dernières tâches</h1>
    <ul>
      <?php foreach ($tasks as $task): ?>
        <li><a class="<?= $task['status'] ?>Task" href="?page=task&id=<?= $task['id'] ?>"><?= htmlspecialchars($task['name']) ?> | <?= $task['duration'] ?> Heures</a></li>
      <?php endforeach; ?>
    </ul>
  </div>
</section><!--
--><section class="elementList">
  <a href="?page=newContact&client_id=<?= $client['id'] ?>" class="add">Nouveau Contact</a>
  <div>
    <h1>Contacts</h1>
    <ul>
      <?php foreach ($contacts as $contact): ?>
        <li><a href="?page=contact&id=<?= $contact['id'] ?>"><?= htmlspecialchars($contact['firstName']) ?> <?= htmlspecialchars($contact['lastName']) ?></a></li>
      <?php endforeach; ?>
    </ul>
  </div>
</section><!--
--><section class="elementList">
  <a href="?page=newPurchase&client_id=<?= $client['id'] ?>" class="add">Nouvel Achat</a>
  <div>
    <h1>Derniers achats</h1>
    <ul>
      <?php foreach ($purchases as $purchase): ?>
        <li><a href="?page=purchase&id=<?= $purchase['id'] ?>"><?= htmlspecialchars($purchase['name']) ?> | <?= $purchase['remainingHours'] ?> Heures restantes</a></li>
      <?php endforeach; ?>
    </ul>
  </div>
</section>
<section class="hours">
  <p id="totalHours"><?= $purchasedHours ?> Heures Total Achetées | <?= $workedHours ?> Heures de travail | <span id="remainingHours"><?= $remainingHours ?> Heures restantes</span></p>
</section>

<?php $content = ob_get_clean();
