<?php  
    
    //引入設定檔
    require('../php/set.php') ;
    if( isset( $_SESSION['log'] ) ){        
        
        if( isset( $_GET['log'] ) ){
            session_unset();
            $smarty->assign('login' , 0 ) ;
        }else{
            if( isset( $_SESSION['host'] ) ){
                $smarty->assign('host' , $_SESSION['host']  ) ;
            }else{
                $smarty->assign('host' , 0  ) ;
            }
            $smarty->assign('login' , $_SESSION['log']  ) ;
        }
        
        $smarty->display('../html/index.html') ;
    }else{
        
        $smarty->assign('login' , 0  ) ;
        $smarty->display('../html/index.html') ;
        
    }
    
?>