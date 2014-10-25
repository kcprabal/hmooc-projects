<h1>Selling Page</h1>
<?php if(!isset($error)) { ?>
<table>
<thead>
 <tr>
   <td>Symbol</td>
   <td>Company</td>
   <td>Amount Hold</td>
   <td>Buy Price</td>
   <td>Current Price</td>
 </tr>
</thead>
<tbody>
  <tr>
   <td><?= $transaction['symbol'];?></td>
   <td><?= $transaction['company'];?></td>
   <td><?= $transaction['amount'];?></td>
   <td><?= $transaction['buy_price'];?></td>
   <td><?= $transaction['current_price'];?></td>
  <tr>
</tbody>
</table>
<br/><br/>
<label for='amount'>Amount to sell (Int only)</label><br/>
<input type='text' id='amt' name='amt' autofocus autocomplete="off">
<input id='tid' type='hidden' name='tid' value="<?= $transaction['tid'];?>">
<button id='button' type='submit' value='sell' onClick='sellIt();'>sell</button>
<div id='warning' style='color:red;'></div>
<?php }else{;?>
<div style='color:red'><?= $error;?></div>
<?php };?>
<script>
  function isInt(n){
      return  n % 1 ===0;
  }
  
  function sellIt(){
      var samt = document.getElementById('amt').value; 
      var amt = parseFloat(samt);
      var tid = document.getElementById('tid').value;
      if(isInt(amt)){
          window.location.assign ( '<?= site_url("sell");?>' + '/' + tid + '/' + amt);
      }else{
         document.getElementById('warning').innerHTML = 'Integer input only'; 
      }
      return false;
  }

  var amount = document.getElementById('amt');
  var button = document.getElementById('button');

  amount.addEventListener("keypress",function(event){
      if (event.keyCode == 13) button.click();
  });
</script>
