<ul class='list-group'>
  <?php foreach ($scope['a'] as $index => $val) { ?>
    <li class='list-group-item'>
      <?php 
      $__=isset($val->firstName) ? $val->firstName : $val['firstName'];
      echo htmlspecialchars($__)
       ?>
        <a href='<?php echo "/usuario/:GET/" . $val['_id'] ?>' class='btn btn-primary'>
          | EDIT
        </a>
        <a href='<?php echo "/usuario/:DELETE/" . $val['_id'] ?>' class='btn btn-danger'>
          | DELETE
        </a>
    </li>
  <?php } ?>
</ul>
