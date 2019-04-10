<?php
    //載入設定檔案
    //smarty session cache 
    require("../php/set.php") ;
    //登入?
    if( isset( $_SESSION['acc'] ) ){
        //哪個頁面
        if( isset( $_GET['select'] ) ){
            $_SESSION['$select'] = $_GET['select'] ;
        }else{
            $_SESSION['$select'] = 1 ;
        }
        //更多紀錄?
        if( isset( $_GET['more_shop_record'] ) ){
            $smarty->assign('more' , 1) ;
        }else{
            $smarty->assign('more' , 0) ;
        }
        //店家帳號?
        if( isset( $_SESSION['host'] ) ){
            $smarty->assign('host' , 1  ) ;
        }else{
            $smarty->assign('host' , 0  ) ;
        }
        //顯示
        $smarty->assign("select" , $_SESSION['$select']) ;
        $smarty->display("../html/host.html") ;
        
    }else {
        //否:傳回主頁面
        header('refresh:0 ; url="../web/index.php"');
    }
    

?>
