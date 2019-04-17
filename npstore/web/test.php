<?php  
/*
    print_r( $_GET['commodity'] ) ;
    echo '<br>' ;
    print_r( $_GET['count'] ) ;
    echo '<br>' ;
    print_r( $_GET['price'] ) ;
    echo '<br>' ;
    echo '<br>' ;
    echo '<br>' ;
    $commodity = $_GET['commodity'] ;
    $count = $_GET['count'] ;
    $price = $_GET['price'] ;
    function exe_checkout($commodity , $count , $price , $ord){
        global $mysql ;
        $str = '' ;
        is_array($commodity) or $commodity = array($commodity) ;
        is_array($count) or $commodity = array($count) ;
        is_array($price) or $commodity = array($price) ;
        foreach( $commodity  as $k =>$commodity ){
            $str .= '(\'' . $commodity . '\',' . $count[$k] . ',' .$price[$k] . ',' . $ord .'),' ;
        }
        echo $str ;
        echo '<br>' ;
        $str = substr($str , 0 , -1) ;
        echo $str ;
        /*
        $insertsql = 'insert into `ord` (commodity,count,price,ord) values ' .$str. ';'  ;
        $mysql->query($insertsql) ;
        */
    /*
    }
    echo exe_checkout($commodity , $count , $price , 116) ;
    */
    $user = 'root' ;
    $pwd = 'admin' ;
    $dbn =  "mysql:host=localhost;dbname=store;charset=utf8" ;
    $mysql = new PDO( $dbn , $user , $pwd ) ;
    $ordselsql = $mysql->query('select MAX(ord) from `record`') ;
    $selectsql = $mysql->query('select * from user where `id` = 5 and `user` = \'Syow\' ') ;
    foreach ($selectsql as $user) {
        foreach ($ordselsql as $ord) {
            echo $user['user'] ;
            echo '<br>' ;
            echo ++$ord['MAX(ord)'];
        }
    }

?>