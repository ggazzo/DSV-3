<ul class='list-group'>
  <?php foreach ($scope['a'] as $index => $val) { ?>
    <li class='list-group-item'>
      <?php 
      $__=isset($val->name) ? $val->name : $val['name'];
      echo htmlspecialchars($__)
       ?>
        <a href='<?php echo "/usuario/:GET/" . $val['_id'] ?>' class='btn btn-primary'>
           EDIT
        </a>
        <a href='<?php echo "/usuario/:DELETE/" . $val['_id'] ?>' class='btn btn-danger'>
           DELETE
        </a>
    </li>
  <?php } ?>
</ul>
