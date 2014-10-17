<?php require 'header.php';?>

<div class = "container">
  <h1>The shopping cart</h1>
  <?php if(array_key_exists('cart',$data)):?>
    <p class="bg-info">you cart is empty, go to pick some thing!</p>
  <?php endif;?>
  <?php if(!array_key_exists('cart',$data)):?>
    
  <table class="table table-bordered">
  <thead>
      <td>#</td>
      <td>food</td>
      <td>size</td>
      <td>quantity</td>
      <td>price for one</td>
  </thead>
  </table> 
  <pre>
     <?php print_r($_SESSION);?>
  </pre>
  <?php endif;?>
  <div class="pull-right"><h2>Total: </h2></div> 
  <a class='btn btn-default' href="<?php echo URL;?>">Return</a>
  <a class='btn btn-default' href="<?php echo URL.'?clear=true';?>">Clear</a>
<?php require 'footer.php';?>
