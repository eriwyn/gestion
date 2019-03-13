<?php $title = 'Liste des clients' ?>

<?php ob_start(); ?>

<section class="clientList">
  <div class="menu">
    <a class="add" href="?page=newClient">Nouveau Client</a>
    <input type="search" name="searchClient" placeholder="Rechercher" class="searchBar" id="searchClient">
  </div>
  <table class="clientList">
    <thead>
      <tr>
        <th><a href="#" class="sort asc" id="name">Nom</a></th>
        <th><a href="#" class="sort" id="mail">Mail</a></th>
        <th><a href="#" class="sort" id="tel">Tel</a></th>
      </tr>
    </thead>
    <tbody>
      <!-- Liste des clients -->
    </tbody>
  </table>
  <nav class="pagination">
    <a href="#" id="previous">&lt;</a><!--
 --><?php for ($i=0; $i < ($clientNumber/10); $i++): ?><!--
 --><a href="#" id="<?= 'page' . ($i + 1) ?>"><?= $i + 1 ?></a><!--
 --><?php endfor ?><!--
 --><a href="#" id="next">></a>
  </nav>
</section>

<?php $content = ob_get_clean() ?>

<?php $script = 'clientList' ?>
