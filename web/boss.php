<?php
    require("../php/set.php") ;
    include("../php/function.php") ;
    if( isset( $_GET['page'] ) ){
        $_SESSION['$page'] = $_GET['page'] ;
    }else{
        $_SESSION['$page'] = 1 ;
    }

    $smarty->assign("page" , $_SESSION['$page']) ;
    $smarty->display("../html/boss.html") ;
?>
