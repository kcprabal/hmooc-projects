<?php
define("SITE_ROOT",__dir__);
require("app/configs/config.php");
require("app/configs/functions.php");


require(CONFIGS_PATH.'Route.php');
require(CONTROLLERS_PATH.'Cindex.php');

$route = new Route();
