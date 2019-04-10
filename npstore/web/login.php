<?php  
    //引入設定檔
    require('../php/set.php') ;
    
    if( isset($_POST['log']) ){
        $_SESSION['acc'] = $_POST['acc'] ;
        $_SESSION['pwd'] = $_POST['pwd'] ;
        if( isset( $_POST['host_check'] ) ){
            $_SESSION['host'] = $_POST['host'] ;
        }
        $_SESSION['log'] = 1 ;
        header('refresh:0 ; url="../web/index.php"');
    }else{
        $smarty->display('../html/login.html') ;
    }

?>