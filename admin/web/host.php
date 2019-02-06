<?php
    require("../../php/set.php") ;
    include("../../php/function.php") ;
    if( isset( $_GET['select'] ) ){
        $_SESSION['$select'] = $_GET['select'] ;
    }else{
        $_SESSION['$select'] = 1 ;
    }

    $smarty->assign("select" , $_SESSION['$select']) ;
    $smarty->display("../html/host.html") ;
?>
