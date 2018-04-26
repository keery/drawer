<h1>la liste des users</h1>



<div>
    <?php

    foreach ($users  as $user =>$value)
    {
    ?>
      <ul>
          <li><?php echo $value->id;?></li>
          <li><?php echo $value->firstName;?></li>
          <li><?php echo $value->lastName;?></li>
          <li><?php echo $value->email;?></li>
          <li><?php echo $value->password;?></li>
          <li><?php echo $value->token;?></li>
          <li><?php echo $value->date_inscription;?></li>
          <li><?php echo $value->date_edition;?></li>
          <li><?php echo $value->id_image;?></li>
          <li><?php echo $value->status;?></li>
          <li><?php echo $value->age;?></li>
      </ul>

        <?php
    }
    ?>

</div>