<?php $title = 'Nouveau client' ?>

<?php ob_start(); ?>

<p class="previous"><a href="?page=listClients">Retour</a></p>
<h1 class="add">Nouveau Client</h1>
<form class="" action="" method="post">
  <ul>
    <li>
      <label for="name">Nom : </label>
      <input type="text" name="name" id="name" value="" required>
    </li>
    <li>
      <label for="address">Adresse : </label>
      <textarea name="address" id="address" rows="3" cols="30"></textarea>
    </li>
    <li>
      <label for="postal">Code Postal : </label>
      <input type="text" name="postal" id="postal" value="">
    </li>
    <li>
      <label for="city">Ville : </label>
      <input type="text" name="city" id="city" value="">
    </li>
    <li>
      <label for="country">Pays : </label>
      <input type="text" name="country" id="country" value="">
    </li>
    <li>
      <label for="tel">Numéro de Téléphone : </label>
      <input type="tel" name="tel" id="tel" value="">
    </li>
    <li>
      <label for="mail">Adresse Mail : </label>
      <input type="email" name="mail" id="mail" value="">
    </li>
  </ul>
  <button name="button">Valider</button>
</form>

<?php $content = ob_get_clean() ?>
