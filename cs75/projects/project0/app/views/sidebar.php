  <div class="col-sm-4 col-lg-4 col-xs-4 col-md-4">
      <ul class="sidebar-nav" class="container">
        <?php foreach ($category as $cat) :?>
          <li class="sidebar-brand">
            <a href="<?php echo URL.'index.php?category='.$cat;?>"><?php echo $cat;?></a>
          </li>
        <?php endforeach;?>
      </ul>
  </div>
