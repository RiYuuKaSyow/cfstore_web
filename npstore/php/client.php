<?php
    //允許另一個網域名存取
    header('Access-Control-Allow-Origin:http://eceaiot.niu.edu.tw/');
    if( isset($_GET['action'])  ){

        //$client_array = array( 'location'=>'http://120.101.8.8/npstore/php/server.php' , 'uri'=>'48763' ) ;
        $client_array = array( 'location'=>'http://localhost/npstore/php/server.php' , 'uri'=>'48763' ) ;
        $client = new SoapClient( null , $client_array ) ;
        
        $action = $_GET['action'] ;
        switch($action) {
            
            case 'host_goods_show': {
                echo $client->host_goods_show($_GET['shop']) ;
                break ;
            }
            case 'status_show' : {
                echo $client->status_show($_GET['shop']) ;
                break ;
            }
            case 'shop_record_show' : {
                echo $client->shop_record_show($_GET['shop']) ;
                break ;
            }
            case 'customer_record_show' : {
                echo $client->customer_record_show($_GET['user']) ;
                break ;
            }
            case 'commodity_search' : {
                echo $client->commodity_search( $_GET['keyword'] , $_GET['orderby'] , $_GET['shop']) ;
                break ;
            }
            case 'index_commodity_search' : {
                echo $client->index_commodity_search( $_GET['keyword'] ) ;
                break ;
            }
            case 'index_goods_show' : {
                echo $client->index_goods_show() ;
                break ;
            }
            case 'record_search' : {
                echo $client->record_search( $_GET['keyword'] , $_GET['time_start'] , $_GET['time_end'] ,$_GET['shop']) ;
                break ;
            }
            case 'log' : {
                echo $client->log( $_GET['who'] , $_GET['acc'] , $_GET['pwd'] ) ;
                break ;
            }
            case 'exe_check_id' : {
                list( $user , $ord ) = $client->exe_check_id( $_GET['id'] , $_GET['user'] )  ;
                echo json_encode( array(
                    "user" => $user ,
                    "ord" => $ord
                ) ) ;
            
                break ;
            }
            case 'ord_alert':{
                echo $client->ord_alert( $_GET['ord'] ) ;
                break;
            }
            case 'description':{
                echo $client->description($_GET['commodity']) ;
                break ;
            }
        }
    }
    if( isset($_POST['action']) ){
        $client_array = array( 'location'=>'http://120.101.8.8/npstore/php/server.php' , 'uri'=>'48763' ) ;
        //$client_array = array( 'location'=>'http://localhost/npstore/php/server.php' , 'uri'=>'48763' ) ;
        $client = new SoapClient( null , $client_array ) ;
        
        $action = $_POST['action'] ;
        switch($action){
            case 'exe_prepaid':{
                $client->exe_prepaid( $_POST['user'] , $_POST['prepaid_num'] ) ;
                break ;
            }
            case 'exe_checkout':{
                $client->exe_checkout( $_POST['user'] , $_POST['commodity'] , $_POST['count'] , $_POST['price'] , $_POST['ord'] ) ;
                break ;
            }
        }
    }
    
    if( isset($_POST['imgBase64']) ){
        $client_array = array( 'location'=>'http://120.101.8.8/npstore/php/server.php' , 'uri'=>'48763' ) ;
        //$client_array = array( 'location'=>'http://localhost/npstore/php/server.php' , 'uri'=>'48763' ) ;
        $client = new SoapClient( null , $client_array ) ;
        
        $img = $_POST['imgBase64'] ;
        $img = str_replace('data:image/png;base64,' , '' ,$img) ;
        $img = str_replace(' ' , '+' , $img ) ;
        $data = base64_decode($img) ;
        $file = '../img/test.png' ;
        file_put_contents($file,$data) ;        
        exec('curl -X POST -F image=@' .$file. ' http://120.101.8.8:5000/' , $json) ;
        $json = str_replace("\"" , '' , $json) ;
        $json = str_replace("," , '' , $json) ;
        $json = str_replace("label:" , '' , $json) ;
        
        list( $str , $price_count ) = $client->exe_photo($json) ;
        echo json_encode( array(
            "str" => $str ,
            "price_count" => $price_count
        ) ) ;

    }
    
?>