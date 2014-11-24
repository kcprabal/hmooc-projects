<h1>Dashboard</h1>
<h2>Hi dear <em><?= $username;?></em></h2>
<p>Welcome back to your dashboard</p>
<p>You have got <span id="balance"></span> dollars left</p>
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
<table id="inventory">
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
</tbody>
</table>
    <div><h2>Total:<span id="total"></span></h2></div>
<script>
  "use strict";
  $(document).ready(function(){
    var url = "<?= site_url();?>";
    var balance = <?= $balance;?>;
    var total = 0;
   var amount = $('#amt');
    updateInventory();
    var price;
    $("#query").submit(function(){
      $.ajax({
        url:url+"query",
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
    });
    function updateInventory(){
      $('#inventory tbody *').remove();
      $.getJSON(url+"inventory", function(data){
         var i = 1;
         var inventories = data.inventory;
         if(inventories !== null){
        $.each(inventories,function(key,inventory){
          var node=  "<tr><td>" + (key+1)
                    +"</td><td>"+ inventory.symbol
                    +"</td><td>"+ inventory.company
                    +"</td><td>"+ inventory.buy_price
                    +"</td><td>"+ inventory.current_price
                    +"</td><td>"+ inventory.amount
                    +"</td><td>"+ inventory.amount*inventory.current_price
                    +"</td><td><a href='#' class="+inventory.symbol+"-buy"+">Buy</a></td>"
                    +"<td><a href='#' class="+inventory.symbol+"-sell"+">Sell</a></td></tr>";
          $('#inventory tbody').append(node);
          total += inventory.amount*inventory.current_price;
          i++;
        })};
        $("#balance").html(''+balance);
        $("#total").html(''+total.toFixed(2));
      }); 
    }
   $('#button').on('click',function (event){
      var samt = $('#amt').val(); 
      var amt = parseFloat(samt);
      var quote = $('#sid').val();
      if(amt % 1 === 0 && amt >= 0 && $('#tips').val() <= balance){
        $.ajax({
          url: url + 'buy' + '/' + quote + '/' + amt,
          success:function(data){
            if(data.error === null){
              $('#warning').html("Buy success");
              updateInventory();
            }else{
              $('#warning').html(data.error);
            }
          }
        });
     }else{
       $('#warning').html('Positive Integer input only'); 
     }
     return false;
   });

   amount.bind("keypress",function(event){
    if (event.which == 13) $("#button").click();
    else if(event.which==8 | (event.which <= 57 && event.which >= 48)){
      var cur;
      if(event.which == 8){
        cur=$(this).val()+'';
        cur=cur.substring(0,cur.length-1);
      }
      else{
        cur=$(this).val()+''+event.key;
      }
      var total = parseFloat(cur)*price;
      $('#tips').html('' + total );
      if(total >= balance)
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