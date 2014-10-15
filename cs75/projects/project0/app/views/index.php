<?php require('header.php');?>
<?php extract($data);?>
<div class="container">
    <div class="row">
    <?php require('sidebar.php');?>
    <div class="col-xs-8 col-lg-8 col-sm-8 col-md-8">
       <h1><?= $index;?></h1>
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
            <?php $pc = (get_object_vars($pc));
                  $nm = $name[$i -1 ];     
            ?>
                 <tr>
                    <td><?php echo $i; $i++;?></td>
                    <td><?php echo $nm;?></td>
                    <td>
                        <?php 
                            for($k = 0; $k < sizeof($pc); $k++)
                                echo '<input type="radio" name="size">'.$pc[$k].'<br/>';
                        ?>
                    </td>
                    <td>
                        <form action="hi.php" method="get">
                        <select class="form-control">
                        <?php
                            for($j = 0; $j < 9; $j++)
                                echo "<option>$j</option>";
                        ?>
                        </select>
                        </form>
                </tr>
               <?php endforeach ;?>
            </tbody>
      </table>
    </div>
</div>
<?php require('footer.php');
