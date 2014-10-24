<h1>Welcome to the query page</h1>
<p>The quote info you are querying at is : </p>
<h2><b><?= $quote[2];?></b></h2>
<p>Price: <em><?= '$'.$quote[3].'/share';?></em></p>
  <label for='amt'>Amount(Integer Only)</label><br/>
  <input id='amt'  type='text' name='amt' autofocus autocomplete="off">
  <input id='sid' type='hidden' name='sid' value='<?= $quote[1];?>'>
  <button id='button' type='submit' value='buy' onClick='buyIt();' >buy</button>
<div style="color:red;" id='warning'></div>
<br/><br/>
<a href="<?= site_url('dashboard');?>">Return to Dashboard</a>

<script>
  function isInt(n){
      return  n % 1 ===0;
  }
  
  function buyIt(){
      var samt = document.getElementById('amt').value; 
      var amt = parseFloat(samt);
      var quote = document.getElementById('sid').value;
      if(isInt(amt)){
         window.location.assign ( '<?= site_url("buy");?>' + '/' + quote + '/' + amt);
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
