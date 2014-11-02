<!DOCTYPE html>
<html>
<head>
  <title>CS75| Bart</title>
  <meta name="viewport" content="initial-scale=1.0, user_scalable=no">
  <meta charset="utf-8">
  <style>
    html, body, #map-canvas{
        height:100%;
        margin:0;
        padding:0
    }
  </style>
  <script src="https://maps.googleapis.com/maps/api/js?v=3.exp"></script>
  <script>
    var map;
    function initialize(){
        var mapOptions = {
            zoom: 8,
            center: new google.mpas.LatLng(-34.397,150.644)
        };
        map = new google.maps.Map(document.getElementById('map-canvas'),
                                     mapOptions);
    }
    google.maps.event.addDomListener(window,'load',initialize);
  </script>
</head>
<body>
  <div class="container">
    <a href="<?= site_url();?>"?>Home Page</a>
    <?php if($this -> session -> userdata('logged_in') === TRUE ):?>
    <a href="<?= site_url('logout');?>">Logout</a>
    <?php endif;?>
