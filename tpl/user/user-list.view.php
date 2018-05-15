<img src="assets/img/man-user.svg" alt="" class="picto-page picto-user">
<h1>Utilisateurs</h1>

<nav class="container ctn-nav small-xs">
  <div class="nav-links" data-selected-filter="Published">
    <a href="" class="selected">on met des filtre ici</a>
    <a href=""> ou pas?</a>
  </div>
  <a href="article" class="btn-add" title="Ajouter un élément"></a>
</nav>

<section class="container">

    <ul class="list">
    <?php

    foreach ($users  as $user =>$value)
    {
    ?>


    <li class="list-item">
    <div class="text-list"><?php echo $value->lastName; echo " ".$value->firstName; ?></div>
    <div class="details-list"><span class="date-details-list"><?php echo  $value->date_inscription ;?></span></div>
    <span class="btn-edit-item">
        <span></span>
        <ul>
          <li><a href="<?php echo "admin/user_edit/".$value->id; ?>">Éditer</a></li>
          <li><a href="<?php echo "admin/delete/user/".$value->id; ?>">Supprimer</a></li>
        </ul>
      </span> 
    </li>

        <?php
    }
    ?>
    </ul>
  
</section>


