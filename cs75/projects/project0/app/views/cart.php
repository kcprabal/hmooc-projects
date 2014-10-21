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
      <?php $i = 0?>
      <?php $total = 0;?>
      <?php foreach($_SESSION['cart'] as $entry):;?>
      <tr>
      <td><?= $i + 1 ;?></td>
      <td><?= $entry['name'];?>
      <td><?= $entry['size'];?>
      <td><?= $entry['quantity'];?>
      <td><?= $entry['price_for_one'];?>
      </tr>
      <?php $total += $entry['quantity'] * $entry['price_for_one'];?>
      <?php $i ++;?>
      <?php endforeach;?>
  </table> 
  <div class="pull-right"><h2>Total: <?= '$'.$total;?></h2></div> 
  <?php endif;?>
  <a class='btn btn-default' href="<?php echo URL;?>">Return</a>
  <a class='btn btn-default' href="<?php echo URL.'?clear=true';?>">Clear</a>
    <div style="height:200px;"></div>
  <form id='checkout' action="index.php" method="get">
  <label for="email">Your Email Address<br/></label>
  <input name="email" type="email" class="form-control" id="email" form="checkout" placeholder="email address">
  <label for="tel-number">Your telephone number<br/></label>
 <input  name="tel-number" type="text" class="form-control" id="tel-number" form="checkout" placeholder="telephone number"> <br/>
<input class="hidden" name="checkout" value="true" form="checkout">
 <button form="checkout" class="btn btn-default" type="submit">Checkout</button>
</form>
<?php require 'footer.php';?>
