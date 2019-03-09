<?php
    if( isset($_GET['action'])  ){

        $client_array = array( 'location'=>'http://120.101.8.8/nopeoplestore/php/server.php' , 'uri'=>'48763' ) ;
        //$client_array = array( 'location'=>'http://127.0.0.1/npstore/php/server.php' , 'uri'=>'48763' ) ;
        $client = new SoapClient( null , $client_array ) ;
        
        $action = $_GET['action'] ;
        switch($action) {
            
            case 'test' :{
                echo $client->test($_GET['i']) ;
                break ;
            }
            case 'turnlight': {
                 echo $client->turnlight( $_GET['light'] ) ;
                 break ;
            }
            case 'number': {
                echo $client->number() ;
                break ;
            }
            case 'host_goods_show': {
                echo $client->host_goods_show() ;
                break ;
            }
            case 'status_show' : {
                echo $client->status_show() ;
                break ;
            }
            case 'record_show' : {
                echo $client->record_show() ;
                break ;
            }
            case 'commodity_search' : {
                echo $client->commodity_search( $_GET['keyword'] , $_GET['orderby']) ;
                break ;
            }
            case 'record_search' : {
                echo $client->record_search( $_GET['keyword'] , $_GET['time_start'] , $_GET['time_end'] ) ;
                break ;
            }
        }
    }
?>