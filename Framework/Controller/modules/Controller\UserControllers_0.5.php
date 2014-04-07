<ul class='list-group'>
  <?php foreach ($a as $index => $val) { ?>
    <li class='list-group-item'>
      <?php 
      $__=isset($val->firstName) ? $val->firstName : $val['firstName'];
      echo htmlspecialchars($__)
       ?>
    </li>
    <a href='<?php echo "/usuario/" . $val['_id'] ?>' class='btn btn-primary'>
    </a>
    <a href='<?php echo "/usuario/deletar/" . $val['_id'] ?>' class='btn btn-danger'>
    </a>
  <?php } ?>
</ul>
