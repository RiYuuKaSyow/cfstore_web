<?php
    //載入設定檔案
    //smarty session cache 
    require("../php/set.php") ;
    //
    if( isset( $_GET['select'] ) ){
        $_SESSION['$select'] = $_GET['select'] ;
    }else{
        $_SESSION['$select'] = 1 ;
    }
    if( isset( $_GET['more_shop_record'] ) ){
        $smarty->assign('more' , 1) ;
    }else{
        $smarty->assign('more' , 0) ;
    }

    $smarty->assign("select" , $_SESSION['$select']) ;
    $smarty->display("../html/host.html") ;
?>
