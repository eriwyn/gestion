<?php $title = 'Erreur 404' ?>

<?php ob_start(); ?>

<h1>Erreur 404</h1>
<p>La page <?= $_GET['page'] ?> n'existe pas.</p>

<?php $content =  ob_get_clean() ?>
