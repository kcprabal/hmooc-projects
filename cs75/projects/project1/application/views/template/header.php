<!DOCTYPE html>
<html>
<head>
  <title>CS75 | C$75 Finace</title>
  <script src="http://code.jquery.com/jquery-latest.js"></script>
</head>
<body>
  <div class="container">
    <a href="<?= site_url();?>"?>Home Page</a>
    <?php if($this -> session -> userdata('logged_in') === TRUE ):?>
    <a href="<?= site_url('logout');?>">Logout</a>
    <?php endif;?>