
<h1>Images</h1>



<section class="container">

    <ul class="list">
        <?php

        foreach ($images  as $user =>$value)
        {
            ?>


            <li class="list-item">
                <div class="text-list"><?php echo $value->src; ?></div>
                <div class="text-list"><?php echo $value->alt; ?></div>
                <div class="text-list"><?php echo $value->position; ?></div>
                <span class="btn-edit-item">
        <span></span>
        <ul>
          <li><a href="<?php echo "".$value->id; ?>">Éditer</a></li>
          <li><a href="<?php echo "admin/delete/image/".$value->id; ?>">Supprimer</a></li>
        </ul>
      </span>
            </li>

            <?php
        }
        ?>
    </ul>

</section>


