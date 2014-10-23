<h1>Dashboard</h1>
<h2>Hi dear <em><?= $username;?></em></h2>
<p>Welcome back to your dashboard</p>
<p>You have got <?= $balance;?> dollars left</p>
<h2>Enquiry</h2>
<form action="<?php echo site_url('query');?>" method='get' accept-charset='utf-8'>
  <label for='quote'>Input the quote you want to query<br />
  <input type='input' name='quote'><br/>
  <input type='submit' name='submit' value='submit'><br/>
</form>

