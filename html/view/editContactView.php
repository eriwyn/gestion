<?php $title = 'Edition du contact ' . htmlspecialchars($contact['firstName']) . ' ' . htmlspecialchars($contact['lastName']) ?>

<?php ob_start(); ?>

<p class="previous"><a href="?page=contact&id=<?= $contact['id'] ?>">Retour</a></p>
<h1 class="modify">Edition du Contact <?= htmlspecialchars($contact['firstName']) ?> <?= htmlspecialchars($contact['lastName']) ?></h1>
<form class="" action="" method="post" enctype="multipart/form-data">
  <ul>
    <li>
      <label for="name">Nom : </label>
      <input type="text" name="name" id="name" value="<?= htmlspecialchars($contact['lastName']) ?>" required>
    </li>
    <li>
      <label for="firstName">Prénom : </label>
      <input type="text" name="firstName" id="firstName" value="<?= htmlspecialchars($contact['firstName']) ?>" required>
    </li>
    <li>
      <label for="photo">Photo : </label>
      <input type="hidden" name="MAX_FILE_SIZE" value="10485760" />
      <input type="file" id="photo" name="photo" accept="image/png, image/jpeg">
    </li>
    <li>
      <label for="address">Adresse : </label>
      <textarea name="address" id="address" rows="3" cols="30"><?= htmlspecialchars($contact['address']) ?></textarea>
    </li>
    <li>
      <label for="postal">Code Postal : </label>
      <input type="text" name="postal" id="postal" value="<?= htmlspecialchars($contact['postalCode']) ?>">
    </li>
    <li>
      <label for="city">Ville : </label>
      <input type="text" name="city" id="city" value="<?= htmlspecialchars($contact['city']) ?>">
    </li>
    <li>
      <label for="country">Pays : </label>
      <input type="text" name="country" id="country" value="<?= htmlspecialchars($contact['country']) ?>">
    </li>
    <li>
      <label for="tel">Numéro de Téléphone : </label>
      <input type="tel" name="tel" id="tel" value="<?= htmlspecialchars($contact['tel']) ?>">
    </li>
    <li>
      <label for="mail">Adresse Mail : </label>
      <input type="email" name="mail" id="mail" value="<?= htmlspecialchars($contact['mail']) ?>">
    </li>
  </ul>
  <button name="button">Valider</button>
</form>

<?php $content = ob_get_clean() ?>
