<?php  
    
    //引入設定檔
    require('../php/set.php') ;
    
    if( isset( $_GET['commodity'] ) ){
        $smarty->assign('commodity' , 1) ;
    }else{
        $smarty->assign('commodity' , 0) ;
    }
    
    if( isset( $_GET['news'] ) ){
        $smarty->assign('news' , 1) ;
    }else{
        $smarty->assign('news' , 0) ;
    }
    
    if( isset( $_SESSION['log'] ) ){        
        
        if( isset( $_GET['log'] ) ){
            session_unset();
            $smarty->assign('login' , 0 ) ;
        }else{
            
            //店家帳號?
            if( isset( $_SESSION['host'] ) ){
                $smarty->assign('host' , $_SESSION['host']  ) ;
                $smarty->assign('user' , $_SESSION['acc']  ) ;
            }else{
                $smarty->assign('host' , 0  ) ;
                $smarty->assign('user' , $_SESSION['user']  ) ;
            }
            
            $smarty->assign('host' , 0) ;
            $smarty->assign('login' , $_SESSION['log']  ) ;
        }
        
        $smarty->display('../html/index.html') ;
    }else{
        $smarty->assign('host' , 0  ) ;
        $smarty->assign('user' , 0  ) ;
        $smarty->assign('login' , 0  ) ;
        $smarty->display('../html/index.html') ;
            
    }
    
?>