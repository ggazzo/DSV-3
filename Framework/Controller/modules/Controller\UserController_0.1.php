<ul class='list-group'>
  <?php foreach ($a as $index => $val) { ?>
    <li class='list-group-item'>
      <?php 
      $__=isset($val->firstName) ? $val->firstName : $val['firstName'];
      echo htmlspecialchars($__)
       ?>
        <a href='<?php echo "/usuario/:GET/" . $val['_id'] ?>' class='btn btn-primary'>
        </a>
        <a href='<?php echo "/usuario/:DELETE/" . $val['_id'] ?>' class='btn btn-danger'>
        </a>
    </li>
  <?php } ?>
</ul>
