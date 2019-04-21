<?php
/* Smarty version 3.1.32, created on 2019-04-21 05:36:25
  from 'E:\xampp\htdocs\npstore\html\index.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32',
  'unifunc' => 'content_5cbbe5392744c9_99915931',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e18c07111acd57ddded28cb88b3a2edb0f7717a3' => 
    array (
      0 => 'E:\\xampp\\htdocs\\npstore\\html\\index.html',
      1 => 1555817775,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5cbbe5392744c9_99915931 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="zh">
<head>
    <meta http-equiv="UserContent-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="cache-control" content="no-cache">
    <meta http-equiv="pragma" content="no-cache">
    <meta http-equiv="expires" content="0">
    <link rel="shortcut icon" href="../img/favicon.ico">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
    <?php echo '<script'; ?>
 src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="http://cdn.bootcss.com/jquery/1.11.3/jquery.min.js" ><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.0/jquery.min.js"><?php echo '</script'; ?>
>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>無人商店</title>
    <meta name="description" content="運用高科技:影像辨識技術，來幫你辨識商品，結帳可以自己來!">
    <meta name="keywords" content="無人商店,商店,便利商店,無人,便利,npstore,NPstore,nopeoplestore,npshop,NPshop,nopeopleshop">
    <style type="text/css">
        html{
            height:100vh;
        }
        body{
            background-color: #ffcc00;
            background-image: url('../logo/logo2.png');
            background-repeat: space;
            background-size:8% 8% ;
            background-position: center;
        }
        #logo_ad{
            font-size: 5% ;
            position: absolute;
            left:15% ;
        }
        #logrow{
            margin:2px 0 10px 0 ;
        }
        li{
            list-style: none ;
            display: inline ;
        } 
        a{
            text-decoration:none;
        }
        #goods img{
            max-width:70px ;
            max-height:50px ;
        }
        #main_frame{
            background-color: #fff;
        }
        .frame_content{
            display:none;
            min-height:90vh ;
        }
        #top{
            background-color: #fff;
        }
        #description_alert{
            width: 600px;
            height: 500px;
            position: fixed;
            top: 50%;
            left: 50%;
            margin-left: -300px;
            margin-top: -250px;
            border-style: solid;
            border-color: #ccc;
            background-color: #fff;
            z-index: 3;
            text-align: center;
        }
    </style>
    <?php echo '<script'; ?>
 type="text/javascript">
        $(function(){
            
            $("#log_out").click(function(){
                window.location.replace('?show=logout') ;
            });
            
            if( <?php echo $_smarty_tpl->tpl_vars['login']->value;?>
 ){
                $("#log_frame").hide() ;
                $("#log_out").show();
                if( <?php echo $_smarty_tpl->tpl_vars['host']->value;?>
 ){
                    $("#host_link").show() ;  
                }else{
                    $("#member_link").html( '<?php echo $_smarty_tpl->tpl_vars['user']->value;?>
' ) ;
                    $("#member_link").show() ;  
                }
            };
            
            switch ('<?php echo $_smarty_tpl->tpl_vars['show']->value;?>
') {
                
                case 'commodity':{
                    commodity_show() ;
                    $("#commodity_data").show();
                    break;
                }
                case 'news':{
                    $("#news").show();
                    break;
                }
                case 'member':{
                    $("#host_frame").show();
                    break;
                }
                default:{
                    $("#index").show();
                    break
                }
            }
            
            $("#commodity_search").keyup(function(){
                goods_search( $("#commodity_search").val() ) ;
            });
            function goods_search( $keyword ){
                $.ajax({
                    method : 'POST' ,
                    url : '../php/client.php' ,
                    data : { action:'index_commodity_search' , keyword:$keyword  } ,
                    success : function( search ){
                        $("#good_show").html( search ) ;
                        for(var i = 0 ; i < $("#good_show tr td").length ; i+=3){
                            $("#good_show tr td:eq(" + i + ")").click(function(){
                                $.ajax({
                                    url:'../php/client.php' ,
                                    data:{ action:'decription' , description:$(this).html() },
                                    success:function( d ){
                                        $("#description_alert").html(d) ;
                                        $("#description_alert").slideUp(200);
                                    }
                                })
                            });
                        }
                    }
                })
            }
            function commodity_show(){
                $.ajax({
                    //url: 'http://120.101.8.8/npstore/php/client.php' ,
                    url: 'http://localhost/npstore/php/client.php' ,
                    data:{ action : 'index_goods_show' } ,
                    success : function( goods ){
                        $("#good_show").html(goods) ;
                        
                        for(var i = 0 ; i < $("#good_show tr td").length ; i+=3){
                            $("#good_show tr td:eq(" + i + ")").click(function(){
                                $.ajax({
                                    url:'../php/client.php' ,
                                    data:{ action:'description' , commodity:$(this).html() },
                                    success:function( d ){
                                        $("#description_alert").html(d) ;
                                        $("#description_alert").slideDown(200);
                                    }
                                })
                            });
                        }
                    }
                })
            } ;
            
        });
        function btn_exit(){
            $("#description_alert").slideUp(200) ;   
        };
    <?php echo '</script'; ?>
>
</head>
<body>
    <!---logo log row--->
    <div id="top" class=" container ">
        <div class="row">
            <div class="col-sm-3 col-xs-3">
                <a href="../web/index.php">
                    <img src="../logo/logo1.png" width="75%" height="75%" alt="">
                </a>
                <div id="logo_ad">Logo通過<a href="https://www.designevo.com/tw/" title="免費線上logo製作軟體">DesignEvo</a>設計製作</div>
            </div>
            <div id="logrow" class="col-sm col-xs">
                <form id="log_frame" class="" action="../web/login.php" method="post">
                    <button type="submit" id="log_btn" class="float-right btn btn-sm btn-outline-warning ">登入</button>
                </form>
                <button type="submit" id="log_out" class="float-right btn btn-sm btn-outline-warning "name="log_out" style="display:none;">登出</button>
            </div>
        </div>
        <!--導覽--->
        <div  class="container bg-warning">
                <ul class="nav navbar list-inline">
                    <li>
                        <a class="disabled" style="color:#f0f0f0 ;">
                            網頁導覽列
                        </a>
                    </li>
                    <li> 
                        <a href="../web/index.php">
                            首頁
                        </a> 
                    </li>
                    <li> 
                        <a href="?show=news">
                            消息專區
                        </a> 
                    </li>
                    <li>
                        <a href="?show=commodity">
                            商品專區
                        </a>
                    </li>
                    <li>
                        <a id="member_link" href="?show=member" style="display:none;" >
                            
                        </a>
                    </li>
                </ul>
            
        </div>
        <!---主要--->
        <div id="main_frame" class="">
            <!---首頁--->
            <div id="index" class="frame_content">
                <div id="carousel" class=" carousel slide " data-ride="carousel" data-interval="3500">
                    <div class="carousel-inner text-center">
                      <div class="carousel-item active">
                        <img class="w-50" src="../img/img3.jpg" alt="" style="width:1000px;" >
                      </div>
                      <div class="carousel-item">
                        <img class="w-50" src="../img/img4.jpg" alt="">
                      </div>
                      <div class="carousel-item">
                        <img class="w-50" src="../img/img5.jpg" alt="">
                      </div>
                    </div>
                    <a href="#carousel" class="carousel-control-prev" role="button" data-slide="prev" >
                      <span class="bg-dark carousel-control-prev-icon"></span>
                    </a>
                    <a href="#carousel" class="carousel-control-next" role="button" data-slide="next" >
                      <span class="bg-dark carousel-control-next-icon"></span>
                    </a>
                    <ol class=" carousel-indicators" >
                      <li data-target="#carousel" data-slide-to="0" class="active"></li>
                      <li data-target="#carousel" data-slide-to="1" ></li>
                      <li data-target="#carousel" data-slide-to="2" ></li>
                    </ol>
                  </div>
                </div>
            </div>
            <!---消息--->
            <div id="news" class="frame_content" >
                <div class="container ">
                    <div class="row">
                        <div class="col-xs-12 col-sm-12">
                            <table class="table text-center">
                                <thead>
                                    <th>發布時間</th>
                                    <th>消息內容</th>
                                </thead>
                                <tbody>
                                    <td>2019/4/10</td>
                                    <td>5/1即將開幕</td>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!---商品--->
            <div id="description_alert" class="" style="display:none;">
                
            </div>
            <div id="commodity_data" class="frame_content">
                <div id="commodity" style="margin-top:3%;" >
                    <div class=" container">
                        <div class=" row ">
                            <div class=" col-sm-6 col-xs-6">
                                查詢 : <input id="commodity_search" type="text" name="" value="" placeholder="輸入商品名">
                            </div>
                            <div class=" col-sm-4 col-xs-4 ">
                                <span style="font-size:20px;">點擊商品名觀看詳細資訊</span>
                            </div>
                        </div>
                    </div>
                    <br>
                    <table id="goods" class=" table table-bordered text-center">
                        <thead class="thead-light" >
                            <tr>
                                <th>商品</th>
                                <th>照片</th>
                                <th>價格</th>
                                <th>商品</th>
                                <th>照片</th>
                                <th>價格</th>
                            </tr>
                        </thead>
                        <tbody id="good_show">
                        </tbody>
                    </table>
                </div>
            </div>
            <!--紀錄-->
            <div id="host_frame" class="frame_content">
                <iframe src="../web/host.php" width="100%" height="555vh" border="0"></iframe>
            </div>
        </div>
    </div>
</body>
</html><?php }
}
