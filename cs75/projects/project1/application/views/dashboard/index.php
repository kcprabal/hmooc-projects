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
    <td>#<td>
    <td>Symbol</td>
    <td>Company</td>
    <td>Buy Price</td>
    <td>Current Price</td>
    <td>Amount Hold</td>
    <td>Total Value</td>
  <tr>
</thead>
<tbody>
  <?php if(!isset($inventory) || count($inventory) == 0){?>
    <tr><td>(Empty Set)<td><tr>
  <?php }else{ ?>
     <?php foreach ($inverntory as $row):?>
       <tr>
        <td>bla</td>
       </tr>
     <?php endforeach;?>
  <?php }?>
</tbody>
