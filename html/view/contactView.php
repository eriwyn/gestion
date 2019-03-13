<?php $title = htmlspecialchars($contact['firstName']) . ' ' . htmlspecialchars($contact['lastName']) ?>

<?php ob_start(); ?>

<p class="previous"><a href="?page=client&id=<?= $contact['clientId'] ?>">Retour</a></p>
<section id="clientDetail">
  <?php if (is_readable('public/media/img/contactPhotos/' . $contact['id'])): ?>
    <img class="photo" src="public/media/img/contactPhotos/<?= $contact['id'] ?>" alt="Photo">
  <?php else: ?>
    <img class="photo" src="public/media/img/contactPhotos/unknown.jpg" alt="photo">
  <?php endif; ?>
  <h1><?= htmlspecialchars($contact['firstName']) ?> <?= htmlspecialchars($contact['lastName']) ?> <a href="?page=editContact&id=<?= $contact['id'] ?>" class="modify">Modifier</a> <a href="?page=removeContact&id=<?= $contact['id'] ?>" class="delete">Supprimer</a></h1>
  <address>
    <?= htmlspecialchars($contact['address']) ?><br>
    <?= htmlspecialchars($contact['postalCode']) ?> <?= htmlspecialchars($contact['city']) ?><br>
    <?= htmlspecialchars($contact['country']) ?><br>
    <a href="mailto:<?= htmlspecialchars($contact['mail']) ?>"><?= htmlspecialchars($contact['mail']) ?></a><br>
    <a href="tel:<?= htmlspecialchars($contact['tel']) ?>"><?= htmlspecialchars($contact['tel']) ?></a>
  </address>
</section>

<?php $content =  ob_get_clean() ?>
