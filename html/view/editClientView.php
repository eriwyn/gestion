<?php $title = 'Edition du Client ' . htmlspecialchars($client['name']) ?>

<?php ob_start(); ?>

<p class="previous"><a href="?page=client&id=<?= $client['id'] ?>">Retour</a></p>
<h1 class="modify">Edition du Client <?= htmlspecialchars($client['name']) ?></h1>
<form class="" action="" method="post">
  <ul>
    <li>
      <label for="name">Nom : </label>
      <input type="text" name="name" id="name" value="<?= htmlspecialchars($client['name']) ?>">
    </li>
    <li>
      <label for="address">Adresse : </label>
      <textarea name="address" id="address" rows="3" cols="30"><?= htmlspecialchars($client['address']) ?></textarea>
    </li>
    <li>
      <label for="postal">Code Postal : </label>
      <input type="text" name="postal" id="postal" value="<?= htmlspecialchars($client['postalCode']) ?>">
    </li>
    <li>
      <label for="city">Ville : </label>
      <input type="text" name="city" id="city" value="<?= htmlspecialchars($client['city']) ?>">
    </li>
    <li>
      <label for="country">Pays : </label>
      <input type="text" name="country" id="country" value="<?= htmlspecialchars($client['country']) ?>">
    </li>
    <li>
      <label for="tel">Numéro de Téléphone : </label>
      <input type="tel" name="tel" id="tel" value="<?= htmlspecialchars($client['tel']) ?>">
    </li>
    <li>
      <label for="mail">Adresse Mail : </label>
      <input type="email" name="mail" id="mail" value="<?= htmlspecialchars($client['mail']) ?>">
    </li>
  </ul>
  <button name="button">Valider</button>
</form>

<?php $content = ob_get_clean() ?>
