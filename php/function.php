<?php
    if( isset($_GET['action'])  ){
        $dbt = 'mysql' ;
        $host = 'localhost' ;
        $dbname = 'store' ;
        $user = 'root' ;
        $pwd = 'admin' ;
        $dbn = "$dbt:host=$host;dbname=$dbname;charset=utf8" ;
        $mysql = new PDO( $dbn , $user , $pwd ) ;

        $action = $_GET['action'] ;
        switch($action) {
            case 'test' : test($_GET['i']) ; break ;
            case 'turnlight': turnlight( $_GET['light'] ) ; break ;
            case 'number':number( $mysql ) ; break ;
            case 'host_goods_show': host_goods_show( $mysql ) ; break ;
            case 'status_show' : status_show( $mysql ) ; break ;
            case 'record_show' : record_show( $mysql ) ; break ;
            case 'commodity_search' : commodity_search( $mysql , $_GET['keyword'] , $_GET['orderby']) ; break ;
            case 'record_search' : record_search( $mysql , $_GET['keyword'] , $_GET['time_start'] , $_GET['time_end'] ) ; break ;
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
    function number( $mysql ){
        $shop = $mysql->query('select shop from status') ;
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
    function host_goods_show( $mysql ){
        $commodity = $mysql->query("select * from commodity_data") ;
        $i = 0 ;
        foreach ($commodity as $goods ) {
            if( !($i % 2) ){
                echo "<tr>" ;
            }
            echo'
            <td>' . $goods['commodity']  . '</td>
            <td> <img src="../../img/img1.jpg" alt=""> </td>
            <td>' . $goods['price'] . "</td>
            <td>" . $goods['remainder'] ."</td>" ;
            if( $i % 2 ){
                echo "</tr>" ;
            }
            $i = $i+1 ;
        }
    }
    function status_show(  $mysql ){

        $status = $mysql->query('select * from status') ;
        foreach ( $status as $status ) {
            echo '<table class="table text-center table-bordered">
                <thead class= " thead-light ">
                    <tr>
                        <th>溫度</th>
                        <th>濕度</th>
                        <th>火焰</th>
                        <th>在店人數</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>' . $status['co1'] . '</td>
                        <td>' . $status['co2'] . '</td>
                        <td>' ;
                        if( $status['fire'] ){
                            echo "感測到火焰"  ;
                        }
                        else {
                            echo "沒感測到火焰" ;
                        }
                        echo '</td>
                        <td>' . $status['online'] . '</td>
                    </tr>
                </tbody>
            </table>' ;
        }
    }
    function record_show( $mysql ){
        $record = $mysql->query('select * from record ') ;
        foreach( $record as $record ){
            echo '<tr>
                    <td>' . $record['time']  . '</td>
                    <td>' . $record['user'] . '</td>
                    <td>' . $record['ord'] . '</td>
                </tr>' ;
        }
    }
    function ord_show( $mysql ){
        $ord = $mysql->query('select * from ord') ;
    }
    function commodity_search( $mysql , $keyword , $orderby){
        $resulte = $mysql->query( 'select * from commodity_data where commodity like \'%' . $keyword .'%\' order by remainder ' . $orderby ) ;
        $i = 0 ;
        foreach ( $resulte as $goods ) {
            if( !($i % 2) ){
                echo "<tr>" ;
            }
            echo'
            <td>' . $goods['commodity']  . '</td>
            <td> <img src="../../img/img1.jpg" alt=""> </td>
            <td>' . $goods['price'] . "</td>
            <td>" . $goods['remainder'] ."</td>" ;
            if( $i % 2 ){
                echo "</tr>" ;
            }
            $i = $i+1 ;
        }
    }
    function record_search( $mysql , $keyword , $time_start , $time_end ){
        $date_end = new DateTime($time_end) ;
        $date_end->modify('+1 day') ;
        $time_end = $date_end->format('Y-m-d h:i:s') ;
        $resulte = $mysql->query( 'select * from record where (user like \'%' . $keyword  .'%\' ) and (time >=\''. $time_start .'\'  and time <= \''.$time_end .'\' ) ' ) ;
        foreach( $resulte as $record ){
            echo '<tr>
                    <td>' . $record['time'] . '</td>
                    <td>' . $record['user'] . '</td>
                    <td>' . $record['ord'] . '</td>
                </tr>' ;
        }
    }
?>
