<?php
    class testA {
        
        private $dbt = 'mysql' ;
        private $host = 'localhost' ;
        private $dbname = 'store' ;
        private $user = 'root' ;
        private $pwd = 'admin' ;
        private $dbn =  "mysql:host=localhost;dbname=store;charset=utf8" ;
        public $mysql ;
        
        public function _construct( $dbn , $user , $pwd ){
            $this->mysql = new PDO( $dbn , $user , $pwd ) ;
        }
        
        public function test(){
            return 'test success' ;
        }
        public function turnlight($light){   
            return $light ;          
        }
        public function number(){
            $mysql = $this->mysql ;
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
        public function host_goods_show(){
            $mysql = $this->mysql ;
            $commodity = $mysql->query("select * from commodity_data") ;
            $i = 0 ;
            $str = "" ;
            foreach ($commodity as $goods ) {
                if( !($i % 2) ){
                    $str .= "<tr>" ;
                }
                $str .='
                <td>' . $goods['commodity']  . '</td>
                <td> <img src="../../img/img1.jpg" alt=""> </td>
                <td>' . $goods['price'] . "</td>
                <td>" . $goods['remainder'] ."</td>" ;
                if( $i % 2 ){
                    $str .= "</tr>" ;
                }
                $i = $i+1 ;
            }
            return $str ;
        }
        public function status_show(){
            $mysql = $this->mysql ;
            $str = "" ;
            $status = $mysql->query('select * from status') ;
            foreach ( $status as $status ) {
                 $str .='<table class="table text-center table-bordered">
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
                            <td>' . $status['co2'] . '</td>' ;
                            if( $status['fire'] ){
                                $str .= '<td style="color:red;">感測到火焰'  ;
                            }
                            else {
                                $str .="<td>沒感測到火焰" ;
                            }
                            $str .='</td>
                            <td>' . $status['online'] . '</td>
                        </tr>
                    </tbody>
                </table>' ;
            }
            return $str ;
        }
        public function record_show(){
            $mysql = $this->mysql ;
            $record = $mysql->query('select * from record ') ;
            $str ="" ;
            foreach( $record as $record ){
                $str .= '<tr>
                        <td>' . $record['time']  . '</td>
                        <td>' . $record['user'] . '</td>
                        <td>' . $record['ord'] . '</td>
                    </tr>' ;
            }
            return $str ;
        }
        public function ord_show(){
            $mysql = $this->mysql ;
            $ord = $mysql->query('select * from ord') ;
        }
        public function commodity_search($keyword , $orderby){
            $mysql = $this->mysql ;
            $resulte = $mysql->query( 'select * from commodity_data where commodity like \'%' . $keyword .'%\' order by remainder ' . $orderby ) ;
            $str = "" ;
            $i = 0 ;
            foreach ( $resulte as $goods ) {
                if( !($i % 2) ){
                    $str .= "<tr>" ;
                }
                $str .='
                <td>' . $goods['commodity']  . '</td>
                <td> <img src="../../img/img1.jpg" alt=""> </td>
                <td>' . $goods['price'] . "</td>
                <td>" . $goods['remainder'] ."</td>" ;
                if( $i % 2 ){
                    $str .= "</tr>" ;
                }
                $i = $i+1 ;
            }
            return $str ;
        }
        public function record_search($keyword , $time_start , $time_end ){
            $mysql = $this->mysql ;
            $str ="" ;
            $date_end = new DateTime($time_end) ;
            $date_end->modify('+1 day') ;
            $time_end = $date_end->format('Y-m-d h:i:s') ;
            $resulte = $mysql->query( 'select * from record where (user like \'%' . $keyword  .'%\' ) and (time >=\''. $time_start .'\'  and time <= \''.$time_end .'\' ) ' ) ;
            foreach( $resulte as $record ){
                $str .= '<tr>
                        <td>' . $record['time'] . '</td>
                        <td>' . $record['user'] . '</td>
                        <td>' . $record['ord'] . '</td>
                    </tr>' ;
            }
            return $str ;
        }
    }

    $server = new SoapServer( null , array( 'uri'=>'48763' ) ) ;
    //$server = new SoapServer(null) ;
    $server->setClass('testA') ;
    $server->handle() ;