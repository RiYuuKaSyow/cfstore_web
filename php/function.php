<?php

    if( isset($_GET['action'])  ){
        $action = $_GET['action'] ;
        switch($action) {
            case 'test' : test($_GET['i']) ; break ;
        }
    }
    function test($i){
        echo $i ;
    }
    
?>
