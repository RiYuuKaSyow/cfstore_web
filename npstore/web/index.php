<?php  
    
    //引入設定檔
    require('../php/set.php') ;
    
    if( isset( $_SESSION['log'] ) ){        
            
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
        
    }else{
        $smarty->assign('host' , 0  ) ;
        $smarty->assign('user' , 0  ) ;
        $smarty->assign('login' , 0  ) ;
            
    }
    
    if( isset($_GET['show']) ){
        if( $_GET['show'] == 'logout' ){
            session_unset();
            $smarty->assign('login' , 0 ) ;
        }
        $smarty->assign( 'show' , $_GET['show'] ) ;
    }else{
        $smarty->assign( 'show' , 'index') ;
    }
    
    $smarty->display('../html/index.html') ;
    
?>