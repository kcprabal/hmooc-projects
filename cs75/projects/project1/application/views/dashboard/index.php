<h1>Dashboard</h1>
<h2>Hi dear <em><?= $username;?></em></h2>
<p>Welcome back to your dashboard</p>
<p>You have got <?= $balance;?> dollars left</p>
<div style="color:red;"><?= $this -> session -> userdata('error');?></div>
<h2>Enquiry</h2>
<form  id="query">
  <label for='quote'>Input the quote you want to query<br /></label>
  <input id="symbol" type='input' name='quote' autofocus required autocomplete="off"><br/>
  <input form="query" type='submit' value="submit"><br/>
</form>
<div id="company"></div>
<div id="price"></div>
<div id="options" style="display:none;">
  <label for='amt'>Amount(Integer Only)</label><br/>
  <input id='amt'  type='text' name='amt' autofocus autocomplete="off">
  <input id='sid' type='text' name='sid' style="display:none;">
  <button id='button' type='submit' value='buy'>buy</button>
<div id='tips'></div>
<div style="color:red;" id='warning'></div>
<br/><br/>
</div>
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
        <td><a href='<?= site_url().'query?symbol='.$row['symbol'];?>'>buy more</a></td>
        <td><a href='<?= site_url('sell_query').'/'. $row['tid'];?>'>sell</a></td>
       </tr>
    <?php $i ++;?>
    <?php $asset += $row['total'];?>
     <?php endforeach;?>
</tbody>
</table>
    <div class="total"><h2>Total:</h2> <?= $asset;?></div>
  <?php }?>
<script>
  "use strict";
  $(document).ready(function(){
    var price;
    $("#query").submit(function(){
      $.ajax({
        url:"<?=site_url('query?');?>",
        data:{
          symbol:$("#symbol").val()
        },
        success: function(data){
          if(data.found === true){
            price = data.price;
            $("#options").show();
            $("#price").html("Price: " + data.price);
            $("#company").html("Company: " + data.company);
            $("#sid").val(""+ $("#symbol").val());
          }else{
            $("#options").hide();
            $("#price").html("Symbol not found");
            $("#company").html('');
          }
        }
      });
      return false;
    })

   $('#button').on('click',function (){
      var samt = $('#amt').val(); 
      var amt = parseFloat(samt);
      var quote = $('#sid').val();
      if(amt % 1 === 0 && amt >= 0 && $('#tips').val() <= <?=$balance;?>){
        $.ajax({
          url:'<?= site_url("buy");?>' + '/' + quote + '/' + amt,
          data:{},
          success:function(data){
            if(data.error === null){
              $('#warning').html("Buy success");

            }else{
              $('#warning').html(data.error);
            }
          }
        })
     }else{
       $('#warning').html('Positive Integer input only'); 
     }
     return false;
   });

   var amount = $('#amt');
   var button = $('#button');

   amount.bind("keydown",function(event){
    if (event.which == 13) button.click();
    else if(event.which==8 | (event.which <= 57 && event.which >= 48)){
      var total;
      if(event.which != 8)
      total = (amount.val()+event.key)*price;
      else
        total = (amount.val())*price;
      $('#tips').html('' + total );
      if(total >= <?= $balance;?>)
        $('#warning').html('You are not that rich');
      else
        $('#warning').html('');
    }else if(event.which == 9){}
    else{
      $('#warning').html('Trying something bad man?');
    }
  });
 });
</script>