<img src="assets/img/man-user.svg" alt="" class="picto-page picto-user">
<h1><?php echo $user->lastName; echo " ".$user->firstName; ?></h1>
<section class="container">
<ul class="list">

  <li class="list-item ">
    <div class="text-list">inscrit le : <?php echo $user->date_inscription ;?></div>
    <div class="text-list">mail : <?php echo $user->email;?> </div>
    <div class="text-list"><?php echo $user->age;?> : ans</div>
    <div class="text-list">rôle : <?php echo $user->status;?> </div>
  </li>
    <div class="text-right text-center-xs col-xs-12">
        <a href="admin/users" class="button btn-validate">Retour à la liste</a>
        <a href="" class="button btn-validate">Supprimer</a>
    </div>
</ul>
</section>
