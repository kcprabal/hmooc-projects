<h1>Login Page</h1>
<p><?= isset($error) ? $error : '';?></p>
<form method="post" accept-charset='utf-8' action="<?php echo site_url('login_action');?>">
  <label for='uname'>User Name</label><br/>
  <input type='input' name='uname' autocomplete="off"><br/>
  <label for='upasswd'>User Password</label><br/>
  <input type='password' name='upasswd' autocomplete="off"><br/>
  <input type='submit' name='submit' value='Submit'>
</form>
