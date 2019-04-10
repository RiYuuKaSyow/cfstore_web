<?php
    if( isset($_GET['action'])  ){

        $client_array = array( 'location'=>'http://120.101.8.8/npstore/php/server.php' , 'uri'=>'48763' ) ;
        //$client_array = array( 'location'=>'http://localhost/npstore/php/server.php' , 'uri'=>'48763' ) ;
        $client = new SoapClient( null , $client_array ) ;
        
        $action = $_GET['action'] ;
        switch($action) {
            
            case 'test' :{
                echo $client->test() ;
                break ;
            }
            case 'turnlight': {
                 echo $client->turnlight(1) ;
                 break ;
            }
            case 'number': {
                echo $client->number() ;
                break ;
            }
            case 'host_goods_show': {
                echo $client->host_goods_show($_GET['shop']) ;
                break ;
            }
            case 'status_show' : {
                echo $client->status_show($_GET['shop']) ;
                break ;
            }
            case 'record_show' : {
                echo $client->record_show($_GET['shop']) ;
                break ;
            }
            case 'commodity_search' : {
                echo $client->commodity_search( $_GET['keyword'] , $_GET['orderby'] , $_GET['shop']) ;
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
                echo $client->exe_check_id( $_GET['id'] , $_GET['user'] ) ;
                break ;
            }
        }
    }
?>