<?php

function render($target,$data){
    require VIEWS_PATH.$target.'.php'; 
}

function get_header(){ 
    require VIEWS_PATH.'header.php'; 
}

function get_footer(){
    require VIEWS_PATH.'footer.php'; 
}
