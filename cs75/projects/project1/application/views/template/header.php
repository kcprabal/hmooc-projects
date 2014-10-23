<!DOCTYPE html>
<html>
<head>
  <title>CS75 | CS$5 Finace</title>
</head>
<body>
  <div class="container">
    <a href="<?= site_url();?>"?>Home Page</a>
    <?php if($this -> session -> userdata('logged_in') === 'true'):?>
    <a href="<?= site_url('dashboard');?>">Dashboard</a>
    <a href="<?= site_url('logout');?>">Logout</a>
    <?php endif;?>
