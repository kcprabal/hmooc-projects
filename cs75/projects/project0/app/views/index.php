<?php require('header.php');?>
<?php extract($data);?>
<div class="container">
    <div class="row">
    <?php require('sidebar.php');?>
    <div class="col-xs-8 col-lg-8 col-sm-8 col-md-8">
       <h1><?= $index;?></h1>
        <?php if(isset($_SESSION['error'])):?>
        <div><h3 class='bg-warning'><?= $_SESSION['error'];?></h3></div>
        <?php unset($_SESSION['error']);?>
        <?php endif;?>
       <table class="table table-borded table-striped">
            <thead>
                <td><h4>#</h4></td>
                <td><h4>Food</h4></td>
                <td><h4>Price</h4></td>
                <td><h4>Quantity</h4></td>
            </thead>
            <tbody>
               <?php $i = 1 ;?>
               <?php foreach($price as $pc) :?>
               <?php $nm = $name[$i - 1];?>
                 <tr>
                    <td><?php echo $i;?></td>
                    <td><?php echo $nm;?></td>
                    <td>
                        <form id='cart' action="index.php" method="get">
                        </form>
                        <?php 
                            for($k = 0; $k < sizeof($pc); $k++){
                                echo '<input form="cart" type="radio" name="s'.$i.key($pc).'"> '.key($pc).' : '.current($pc).'<br/>';
                                next($pc);
                            }
                        ?>
                    </td>
                    <td>
                    <select form='cart' name="q<?= $i;?>"  class="form-control">
                        <?php
                            for($j = 0; $j < 9; $j++)
                                echo "<option>$j</option>";
                        ?>
                        </select>
                    </td>
                </tr>
                <input class="hidden" name="cart" value="add" form='cart'>
                <input class="hidden" name="category" value="<?= $index;?>" form='cart'>
                <?php $i++;?>
               <?php endforeach ;?>
            </tbody>
      </table>
      <button form='cart' class="btn btn-default" type='submit'>add to chart</button>
      <a class="btn btn-default" href="<?php echo URL.'?cart=view';?>">Cart</a>
    </div>
</div>
<?php require('footer.php');
