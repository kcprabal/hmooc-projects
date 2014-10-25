<h1>Dashboard</h1>
<h2>Hi dear <em><?= $username;?></em></h2>
<p>Welcome back to your dashboard</p>
<p>You have got <?= $balance;?> dollars left</p>
<div style="color:red;"><?= $this -> session -> userdata('error');?></div>
<h2>Enquiry</h2>
<form action="<?php echo site_url('/query');?>" method='get' accept-charset='utf-8' id="query">
  <label for='quote'>Input the quote you want to query<br />
  <input type='input' name='quote' autofocus required autocomplete="off"><br/>
  <input form="query" type='submit'  value='submit'><br/>
</form>
<h2>Your inventory</h2>
<table>
<thead>
  <tr>
    <td>#</td>
    <td>Symbol</td>
    <td>Company</td>
    <td>Buy Price</td>
    <td>Current Price</td>
    <td>Amount Hold</td>
    <td>Total Value</td>
    <td>Buy more</td>
    <td>Sell</td>
  </tr>
</thead>
<tbody>
  <?php if(!isset($inventory) || count($inventory) == 0){?>
    <tr><td>(Empty Set)<td><tr>
  <?php }else{ ?>
     <?php $asset = 0;?>
     <?php $i = 1;?>
     <?php foreach ($inventory as $row):?>
       <tr>
        <td><?= $i;?></td>
        <td><?= $row['symbol'];?></td>
        <td><?= $row['company'];?></td>
        <td><?= $row['buy_price'];?></td>
        <td><?= $row['current_price'];?></td>
        <td><?= $row['amount'];?></td>
        <td><?= $row['total'];?></td>
        <td><a href='<?= site_url('sell');?>'>sell</a></td>
        <td><a href='<?= site_url().'query?quote='.$row['symbol'];?>'>buy more</a></td>
       </tr>
    <?php $i ++;?>
    <?php $asset += $row['total'];?>
     <?php endforeach;?>
  <?php }?>
</tbody>
</table>
    <div class="total"><h2>Total:</h2> <?= $asset;?></div>
