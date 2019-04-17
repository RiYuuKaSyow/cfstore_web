<?php

    $user = 'root' ;
    $pwd = 'admin' ;
    $dbn =  "mysql:host=localhost;dbname=store;charset=utf8" ;
    $mysql = new PDO( $dbn , $user , $pwd ) ;
    
    class EXE {
        public function exe_check_id( $id , $user ){
            global $mysql ;
            $str = "" ;
            $ordselsql = $mysql->query('select MAX(ord) from `record`') ;
            $selectsql = $mysql->query('select * from user where `id` = ' .$id. ' and `user` = \'' .$user. '\' ') ;
            foreach ($selectsql as $user) {
                foreach ($ordselsql as $ord) {
                    return array( $user['user'] , ++$ord['MAX(ord)'] ) ;
                }
            }
            return array(0,0) ;
        }
        public function exe_photo( $json ){
            global $mysql ;
            $str = '' ;
            $price_count = 0 ;
            $i = 0 ;
                                    //  查詢    價格  從   商品資訊        哪裡   商品名字  = 辨識結果$json[3]
            $price_sel = $mysql->query('select price from commodity_data where commodity =\'' .$json[3]. '\'') ;
            foreach( $price_sel as $price ){
                $i++ ;
                // 中間的<td>數量</td> 希望可以從辨識回傳取得
                // <td>' . $json[?] .'
                $str .= '<tr>
                            <td>' . $json[3] . '</td>
                            <td>1</td>
                            <td id="com_price' .$i. '">' . $price['price'] . '</td>
                        </tr>' ;
                //$price_count += (int)$json[?] * (int)$prince['price']
                $price_count += (int)$price['price'] ;
            }
            return array($str , $price_count)  ;
        }
        
        function exe_checkout( $user ,$commodity , $count , $price , $ord){
            global $mysql ;
            $str = '' ;
            is_array($commodity) or $commodity = array($commodity) ;
            is_array($count) or $commodity = array($count) ;
            is_array($price) or $commodity = array($price) ;
            foreach( $commodity  as $k =>$commodity ){
                $str .= '(\'' . $commodity . '\',' . $count[$k] . ',' .$price[$k] . ',' . $ord .'),' ;
            }
            $str = substr($str , 0 , -1) ;    
            $insertsql = 'insert into `ord` (commodity,count,price,ord) values ' .$str. ';'  ;
            $mysql->query($insertsql) ;
            $mysql->query('insert into `record` (user,ord,shop) values (\'' .$user. '\',' .$ord. ',1) ') ;
        }
        
    }
    
    class Server extends EXE {
        
        public function number(){
            global $mysql ;
            $shop = $mysql->query('select shop from status') ;
            foreach($shop as $store){
                if( $store['shop'] ){
                    return "處理中" ;
                }
                else{
                    return "待機中" ;
                }
            }
        }
        public function host_goods_show( $shop ){
            global $mysql ;
            $commodity = $mysql->query("select * from commodity_data where shop =".$shop  ) ;
            $i = 0 ;
            $str = "" ;
            foreach ($commodity as $goods ) {
                if( !($i % 2) ){
                    $str .= "<tr>" ;
                }
                $str .='
                <td>' . $goods['commodity']  . '</td>
                <td> <img src="'. $goods['image'] .'" alt="" style="transform:rotate(90deg);width=100%;height=100%;"> </td>
                <td>' . $goods['price'] . "</td>
                <td>" . $goods['remainder'] ."</td>" ;
                if( $i % 2 ){
                    $str .= "</tr>" ;
                }
                $i = $i+1 ;
            }
            return $str ;
        }
        public function index_goods_show(){
            global $mysql ;
            $commodity = $mysql->query("select * from commodity_data"  ) ;
            $i = 0 ;
            $str = "" ;
            foreach ($commodity as $goods ) {
                if( !($i % 2) ){
                    $str .= "<tr>" ;
                }
                $str .='
                <td>' . $goods['commodity']  . '</td>
                <td> <img src="'. $goods['image'] .'" alt="" style="transform:rotate(90deg);width=100%;height=100%;"> </td>
                <td>' . $goods['price'] . "</td>" ;
                if( $i % 2 ){
                    $str .= "</tr>" ;
                }
                $i = $i+1 ;
            }
            return $str ;
        }
        public function status_show( $shop){
            global $mysql ;
            $str = "" ;
            $status = $mysql->query('select * from status') ;
            foreach ( $status as $status ) {
                 $str .='<table class="table text-center table-bordered">
                    <thead class= " thead-light ">
                        <tr>
                            <th>溫度</th>
                            <th>濕度</th>
                            <th>火焰</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>' . $status['co1'] . '</td>
                            <td>' . $status['co2'] . '</td>' ;
                            if( $status['fire'] ){
                                $str .= '<td style="color:red;">感測到火焰'  ;
                            }
                            else {
                                $str .="<td>沒感測到火焰" ;
                            }
                            $str .='</td>
                        </tr>
                    </tbody>
                </table>' ;
            }
            return $str ;
        }
        public function shop_record_show( $shop){
            global $mysql ;
            $record = $mysql->query('select * from record where shop =' .$shop ) ;
            $str ="" ;
            foreach( $record as $record ){
                $str .= '<tr>
                        <td>' . $record['time']  . '</td>
                        <td>' . $record['user'] . '</td>
                        <td><a href="javascript:show_record_alert(' . $record['ord'] . ')">' . $record['ord'] . '</a></td>
                    </tr>' ;
            }
            return $str ;
        }
        public function customer_record_show( $user ){
            global $mysql ;
            $record = $mysql->query('select * from record where user =\'' .$user. '\'') ;
            $str ="" ;
            foreach( $record as $record ){
                $str .= '<tr>
                        <td>' . $record['time']  . '</td>
                        <td>' . $record['user'] . '</td>
                        <td> <a href="javascript:show_record_alert(' . $record['ord'] . ')">' . $record['ord'] . '</a></td>
                    </tr>' ;
            }
            return $str ;
        }
        public function ord_show(){
            global $mysql ;
            $ord = $mysql->query('select * from ord') ;
        }
        public function commodity_search($keyword , $orderby , $shop){
            global $mysql ;
            $resulte = $mysql->query( 'select * from commodity_data where commodity like \'%' . $keyword .'%\' and shop ='. $shop .' order by remainder ' . $orderby ) ;
            $str = "" ;
            $i = 0 ;
            foreach ( $resulte as $goods ) {
                if( !($i % 2) ){
                    $str .= "<tr>" ;
                }
                $str .='
                <td>' . $goods['commodity']  . '</td>
                <td> <img src="'. $goods['image'] .'" alt="" style="transform:rotate(90deg);width=100%;height=100%;"> </td>
                <td>' . $goods['price'] . "</td>
                <td>" . $goods['remainder'] ."</td>" ;
                if( $i % 2 ){
                    $str .= "</tr>" ;
                }
                $i = $i+1 ;
            }
            return $str ;
        }
        public function index_commodity_search($keyword){
            global $mysql ;
            $resulte = $mysql->query( 'select * from commodity_data where commodity like \'%' . $keyword .'%\'') ;
            $str = "" ;
            $i = 0 ;
            foreach ( $resulte as $goods ) {
                if( !($i % 2) ){
                    $str .= "<tr>" ;
                }
                $str .='
                <td>' . $goods['commodity']  . '</td>
                <td> <img src="'. $goods['image'] .'" alt="" style="transform:rotate(90deg);width=100%;height=100%;"> </td>
                <td>' . $goods['price'] . "</td>" ;
                if( $i % 2 ){
                    $str .= "</tr>" ;
                }
                $i = $i+1 ;
            }
            return $str ;
        }
        public function record_search($keyword , $time_start , $time_end , $shop){
            global $mysql ;
            $str ="" ;
            $date_end = new DateTime($time_end) ;
            $date_end->modify('+1 day') ;
            $time_end = $date_end->format('Y-m-d h:i:s') ;
            $resulte = $mysql->query( 'select * from record where (user like \'%' . $keyword  .'%\' ) and (time >=\''. $time_start .'\'  and time <= \''.$time_end .'\' ) ' ) ;
            foreach( $resulte as $record ){
                $str .= '<tr>
                        <td>' . $record['time'] . '</td>
                        <td>' . $record['user'] . '</td>
                        <td><a href="javascript:show_record_alert(' . $record['ord'] . ')">' . $record['ord'] . '</a></td>
                    </tr>' ;
            }
            return $str ;
        }
        public function log( $who , $acc , $pwd ){
            global $mysql ;
            $str = "" ;
            if( $who == 'host' ){
                $user = $mysql->query('select * from shop where host =\'' .$acc. '\'' ) ;
                foreach ($user as $acc ) {
                    if( md5($pwd) == $acc['pwd'] ){ 
                        return $acc['shop_id'] ;
                    }
                }
                return 0 ;
                
            }else if( $who == 'user' ){
                $user = $mysql->query('select * from user where user =\'' .$acc. '\'' ) ;
                foreach ($user as $user ) {
                    if( md5($pwd) == $user['pwd'] ){
                        return $user['user'] ;
                    }
                }
                return 0 ;
            }
        }
        public function ord_alert( $ord ){
            global $mysql ;
            $str = '<button class="btn" onclick="btn_exit()">X</button>
                    <br>
                    <h2>訂單編號: ' . $ord . '</h2>
                    <br><br><table border=1>' ;
            $f = 0 ;
            $ord_sel = $mysql->query( 'select * from ord where ord='.$ord ) ;
            foreach ( $ord_sel as $record ) {
                $f = 1 ;
                $str .= ' <tr>
                                <td>' .$record['commodity'] .'</td>
                                <td>' .$record['count'] . '個</td>
                                <td>' .$record['price'] . '元</td>
                          </tr>' ;
                $price_count += (int)$record['price']  ;
            }
            if( $f ){
                $str .= '</table>
                        <br><br><br>
                        <h3>總金額: ' . $price_count . ' </h3>' ;
                return $str ;
            }else {
                return '' ;
            }
        }
    }

    $server = new SoapServer( null , array( 'uri'=>'48763' ) ) ;
    //$server = new SoapServer(null) ;
    $server->setClass('Server') ;
    $server->handle() ;
    $mysql = null ;