<?php

    $user = 'root' ;
    $pwd = 'admin' ;
    $dbn =  "mysql:host=localhost;dbname=store;charset=utf8" ;
    $mysql = new PDO( $dbn , $user , $pwd ) ;
    
    //抓第n個字串位置
    function mystrpos( $str , $key , $offset ){
        if( strpos($str,$key) === false ){
            return false ;
        }
        $j = 0 ;
        $strlen = strlen($str) ;
        $keylen = strlen($key) ;
        for($i = 0 ; $i < $strlen ; $i++){
            $words[$i] = substr( $str ,$i , $keylen );     
            if( $words[$i] === $key ){
                $place[$j] = $i ;
                $j++ ;
            }
        }
        if( $offset >= $j ){
            return false ;            
        }else{
            return $place[$offset]+1 ;
        }
    }
    
    class EXE {
        //QR登入
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
        //拍照辨識查詢
        public function exe_photo( $res ){
            
            //SQL語法陣列處理
            $i = 0 ;
            $j = 0 ;
            for(  ;$start = mystrpos($res[0],'\'',$i) ; $i+=2 ){
                
                $end = mystrpos($res[0],'\'',$i+1) ;
                $str = substr($res[0],$start ,$end-$start-1);
                $sql[$j] = 'select * from commodity_data where commodity =\'' .$str. '\'' ;
                $j++ ;
                
            }
            //查詢價格
            global $mysql ;
            $str = '' ;
            $price_count = 0 ;
            for( $i = 0 ; $i < $j ; $i++ ){
                
                $price = $mysql->query( $sql[$i] ) ;
                foreach ($price as $p ) {
                    // 中間的<td>數量</td> 希望可以從辨識回傳取得
                    $str .= '<tr>
                                <td>' . $p['commodity'] . '</td>
                                <td>1</td>
                                <td id="com_price' .$i. '">' . $p['price'] . '</td>
                            </tr>' ;
                    //$price_count += (int)$json[?] * (int)$prince['price']
                    $price_count += (int)$p['price'] ;
                }
                
            }
            return array($str , $price_count)  ;
            
        }
        //結帳
        public function exe_checkout( $user ,$commodity , $count , $price , $ord){
            global $mysql ;
            $str = '' ;
            $price_count = 0 ;
            $old_balance = $mysql->query('select balance from user where user=\''.$user.'\'') ;
            is_array($commodity) or $commodity = array($commodity) ;
            is_array($count) or $commodity = array($count) ;
            is_array($price) or $commodity = array($price) ;
            foreach( $commodity  as $k =>$commodity ){
                $str .= '(\'' . $commodity . '\',' . $count[$k] . ',' .$price[$k] . ',' . $ord .'),' ;
                $price_count += $price[$k] ;
            }
            foreach ($old_balance as $old ) {
                $new_balance = $old['balance'] - $price_count ;
            }
            $str = substr($str , 0 , -1) ;    
            $insertsql = 'insert into `ord` (commodity,count,price,ord) values ' .$str. ';'  ;
            $mysql->query($insertsql) ;
            $mysql->query('insert into `record` (user,ord,shop) values (\'' .$user. '\',' .$ord. ',1) ') ;
            $mysql->query('update `user` set `balance` =' .$new_balance. ' where `user`=\''.$user. '\'') ;
        }
        //儲值
        public function exe_prepaid($user , $num){
            global $mysql ;
            $old_num = $mysql->query('select balance from user where user=\''.$user.'\'') ;
            foreach( $old_num as $old ){
                $num += $old['balance'] ;
            }
            $mysql->query('update `user` set `balance` =' .$num. ' where `user`=\''.$user. '\'') ;
        }
        
    }
    
    class Server extends EXE {
        
        //店家商品資訊
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
        //首頁商品資訊
        public function index_goods_show(){
            global $mysql ;
            $commodity = $mysql->query("select * from commodity_data"  ) ;
            $i = 0 ;
            $str = "" ;
            foreach ($commodity as $goods ) {
                if( !($i % 2) ){
                    $str .= "<tr>" ;
                }
                if( strpos( $goods['image'] , ',' ) ){
                    $len = strpos( $goods['image'] , ',' ) ;
                    $img = substr( $goods['image'] , 0 , $len ) ;
                    $str .='
                    <td>' . $goods['commodity']  . '</td>
                    <td> <img src="'. $img.'" alt="" style="transform:rotate(90deg);width=100%;height=100%;"> </td>'.
                    //<td style="font-size:12px;">' . $goods['description'] . '</td>
                    '<td>' . $goods['price'] . "</td>" ;
                }else{
                    $str .='
                    <td>' . $goods['commodity']  . '</td>
                    <td> <img src="'. $goods['image'].'" alt="" style="transform:rotate(90deg);width=100%;height=100%;"> </td>'.
                    //<td style="font-size:12px;">' . $goods['description'] . '</td>
                    '<td>' . $goods['price'] . "</td>" ;
                }
                if( $i % 2 ){
                    $str .= "</tr>" ;
                }
                $i = $i+1 ;
            }
            return $str ;
        }
        //店家狀態資訊
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
        //消費紀錄-店家
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
        //消費紀錄-消費者
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
        //店家商品搜尋
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
        //首頁商品搜尋
        public function index_commodity_search($keyword){
            global $mysql ;
            $resulte = $mysql->query( 'select * from commodity_data where commodity like \'%' . $keyword .'%\'') ;
            $str = "" ;
            $i = 0 ;
            foreach ( $resulte as $goods ) {
                if( !($i % 2) ){
                    $str .= "<tr>" ;
                }
                if( strpos( $goods['image'] , ',' ) ){
                    $len = strpos( $goods['image'] , ',' ) ;
                    $img = substr( $goods['image'] , 0 , $len ) ;
                    $str .='
                    <td>' . $goods['commodity']  . '</td>
                    <td> <img src="'. $img.'" alt="" style="transform:rotate(90deg);width=100%;height=100%;"> </td>'.
                    //<td style="font-size:12px;">' . $goods['description'] . '</td>
                    '<td>' . $goods['price'] . "</td>" ;
                }else{
                    $str .='
                    <td>' . $goods['commodity']  . '</td>
                    <td> <img src="'. $goods['image'].'" alt="" style="transform:rotate(90deg);width=100%;height=100%;"> </td>'.
                    //<td style="font-size:12px;">' . $goods['description'] . '</td>
                    '<td>' . $goods['price'] . "</td>" ;
                }
                $i = $i+1 ;
            }
            return $str ;
        }
        //紀錄搜尋
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
        //登入
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
        //顯示訂單
        public function ord_alert( $ord ){
            global $mysql ;
            $str = '<button class="btn btn-outline-danger" onclick="btn_exit()">X</button>
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
        public function description($commodity){
            global $mysql ;
            $str = '<button class="btn btn-outline-danger" onclick="btn_exit()">X</button>
                    <br>' ;
            $description = $mysql->query('select `description` from `commodity_data` where `commodity`=\'' .$commodity. '\'' ) ;
            foreach( $description as $d ){
                $str .= $d['description'] ;
            }
            return $str ;
        }
    }

    $server = new SoapServer( null , array( 'uri'=>'48763' ) ) ;
    //$server = new SoapServer(null) ;
    $server->setClass('Server') ;
    $server->handle() ;
    $mysql = null ;