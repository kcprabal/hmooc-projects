<h1>Welcome to the register page</h1>
<form method="post" accept-charset='utf-8' action="<?php echo site_url('register_action');?>">
  <label for='uname'>User Name</label><br/>
  <input type='input' name='uname'><br/>
  <label for='upasswd1'>User Password</label><br/>
  <input type='password' name='upasswd1'><br/>
  <label for='upasswd2'>Confirm the password</label><br/>
  <input type='password' name='upasswd2'><br/>
  <input type='submit' name='submit' value='Submit'>
</form>
