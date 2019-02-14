<?php
    if( isset($_GET['action'])  ){
        $action = $_GET['action'] ;
        switch($action) {
            case 'test' : test($_GET['i']) ; break ;
            case 'turnlight': turnlight( $_GET['light'] ) ; break ;
            case 'number':number() ; break ;
            case 'host_goods_show': host_goods_show() ; break ;
        }
    }
    function test($i){
        echo $i ;
    }
    function turnlight($light){
        if($light){
            echo $light ;
        }
        else {
            echo $light ;
        }
    }
    function number(){
        $dbt = 'mysql' ;
        $host = 'localhost' ;
        $dbname = 'store' ;
        $user = 'root' ;
        $pwd = 'admin' ;
        $dbn = "$dbt:host=$host;dbname=$dbname;charset=utf8" ;
        $mysql1 = new PDO( $dbn , $user , $pwd ) ;
        $shop = $mysql1->query('select shop from status') ;
        foreach($shop as $store){
            if( $store['shop'] ){
                echo "處理中" ;
                break;
            }
            else{
                echo "待機中" ;
                break;
            }
        }
    }
    function host_goods_show(){
        $dbt = 'mysql' ;
        $host = 'localhost' ;
        $dbname = 'store' ;
        $user = 'root' ;
        $pwd = 'admin' ;
        $dbn = "$dbt:host=$host;dbname=$dbname;charset=utf8" ;
        $mysql = new PDO( $dbn , $user , $pwd ) ;
        $commodity = $mysql->query("select * from commodity_data") ;
        $i = 0 ;
        foreach ($commodity as $goods ) {
            if( !($i % 2) ){
                echo "<tr>" ;
            }
            echo'
            <td> <img src="../../img/img1.jpg" alt=""> </td>
            <td>' . $goods['price'] . "</td>
            <td>" . $goods['remainder'] ."</td>" ;
            if( $i % 2 ){
                echo "</tr>" ;
            }
            $i = $i+1 ;
        }
    }

?>
