<?php
/* Smarty version 3.1.32, created on 2019-02-17 07:14:23
  from 'E:\xampp\htdocs\admin\html\host.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32',
  'unifunc' => 'content_5c68fbbf401b70_17193437',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'ef680e92022a5afb91f7650efa3268d3bb6c6399' => 
    array (
      0 => 'E:\\xampp\\htdocs\\admin\\html\\host.html',
      1 => 1550384056,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5c68fbbf401b70_17193437 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="zh">
<head>
    <meta http-equiv="UserContent-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="cache-control" content="no-cache">
    <meta http-equiv="pragma" content="no-cache">
    <meta http-equiv="expires" content="0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/web.css">
    <link rel="stylesheet" href="../css/test.css">
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
    <style type="text/css">
        #option{
            width:11%;
            position:fixed;
            top:23%;
            left:3%;
        }
        #option li{
            margin-top:25%;
        }
        #option li a{
            color:black;
            text-decoration:none;
        }
        #btn-exlo{
            position: fixed ;
            margin-top: 100px ;
            top:60% ;
            left:2% ;
            width:20% ;
        }
        td{
            line-height: 650% ;
        }
        #goods img{
            max-width:150px ;
            max-height:150px ;
        }
        .main_frame{
            position: relative;
            left:15%;
            height: 700px;
            width: 80%;
            border-style: none;
            display: none;
            margin-top: 1% ;
        }

    </style>

    <?php echo '<script'; ?>
 type="text/javascript">
        $(function(){
            if( <?php echo $_smarty_tpl->tpl_vars['select']->value;?>
 == 1 ){
                setInterval( status_show , 200 ) ;
                $("#status").toggle();
            }else if ( <?php echo $_smarty_tpl->tpl_vars['select']->value;?>
 == 2 ) {
                record_show() ;
                $("#record").show();
            }else if ( <?php echo $_smarty_tpl->tpl_vars['select']->value;?>
 == 3 ) {
                goods_show() ;
                $("#commodity").show();
            }else if ( <?php echo $_smarty_tpl->tpl_vars['select']->value;?>
 == 4 ) {
                $("#device").show();
            };
            $("#exit").click(function(){
                window.location.href = '../../index.php' ;
            });
            $("#logout").click(function(){
                if( confirm("確定要登出嗎") ){
                    window.location.href = '../../C8763/web/' ;
                };
            });
            $("#customer_search").keyup(function(){
                customer_searchf( $("#customer_search").val() , '10000-01-01 00:00:00' , '9998-12-31 23:59:59' ) ;
            });
            $("#date_button").click(function(){
                customer_searchf( $("#customer_search").val() , $("#time_start").val() , $("#time_end").val() ) ;
            });
            $("#commodity_search").keyup(function(){
                goods_search( $("#commodity_search").val() ) ;
            });
            var $r_order = 0 ;
            $("#remainder_order").click(function(){
                if( $r_order ){
                    $("#remainder_order_resulte").html("升序(由少到多)");
                    $.ajax({
                        method : 'POST' ,
                        url : '../../php/function.php' ,
                        data : { action : 'commodity_search' , keyword : $("#commodity_search").val() , orderby : '' } ,
                        success : function( data ){
                            $("#good_show").html( data ) ;
                        }
                    })
                }else{
                    $("#remainder_order_resulte").html("降序(由多到少)");
                    $.ajax({
                        method : 'POST' ,
                        url : '../../php/function.php' ,
                        data : { action : 'commodity_search' , keyword : $("#commodity_search").val() , orderby : 'desc' } ,
                        success : function( data ){
                            $("#good_show").html( data ) ;
                        }
                    })
                };
                $r_order = ($r_order + 1) %2 ;
            });
            function status_show(){
                $.ajax({
                    method : 'POST' ,
                    url : '../../php/function.php' ,
                    data : { action : 'status_show' } ,
                    success : function( data ){
                        $("#surroding_table").html( data ) ;
                    }
                })
            };
            function record_show(){
                $.ajax({
                    method : 'POST' ,
                    url : '../../php/function.php' ,
                    data : { action : 'record_show' } ,
                    success : function( record ){
                        $("#record_tbody").html( record ) ;
                    }
                })
            };
            function goods_show(){
                $.ajax({
                    method : 'POST' ,
                    url : '../../php/function.php' ,
                    data : { action : 'host_goods_show' } ,
                    success : function(data){
                        $("#good_show").html(data) ;
                    }
                })
            };
            function turnlight(){
                $.ajax({
                    method:'POST' ,
                    url:'../../php/function.php' ,
                    data: { action:'turnlight' , light:$("#light").val()  } ,
                    success: function( response ){
                        $("#hi").html( response ) ;
                    }
                })
            };
            function customer_searchf( $keyword , $time_start , $time_end ){
                $.ajax({
                    method : 'POST' ,
                    url : '../../php/function.php' ,
                    data : { action : 'record_search' , keyword : $keyword , time_start : $time_start , time_end : $time_end  } ,
                    success : function( record ){
                        $("#record_tbody").html( record ) ;
                    }
                })
            }
            function goods_search( $keyword ){
                $.ajax({
                    method : 'POST' ,
                    url : '../../php/function.php' ,
                    data : { action:'commodity_search' , keyword:$keyword , orderby:'' } ,
                    success : function( search ){
                        $("#good_show").html( search ) ;
                    }
                })
            }
        });
    <?php echo '</script'; ?>
>
</head>
<body>
    <div id="option" >
        <ul>
            <li>
                <a href="?select=1">商店狀況</a>
            </li>
            <li>
                <a href="?select=2">消費紀錄</a>
            </li>
            <li>
                <a href="?select=3">商品資訊</a>
            </li>
            <li>
                <a href="?select=4">開關控制</a>
            </li>
        </ul>
    </div>
    <div id="btn-exlo" >
        <button id='exit' class="btn-outline-info btn" type="button" name="button">
            離開
        </button>
        <button id='logout' class="btn-outline-danger btn" type="button" name="button">
            登出
        </button>
    </div>
    <div id="status" class="main_frame">
        <div id="surroding_table">
        </div>
        <table id="customer_table" class="table text-center table-bordered">
            <thead class=" thead-light ">
                <tr>
                    <th>日期</th>
                    <th>當日累積人數</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>2019/02/05</td>
                    <td>123</td>
                </tr>
            </tbody>
        </table>
    </div>
    <div id="record" class="main_frame">
        <div class="container">
            <div class="row">
                <div class="col-sm-4 col-xs-4">
                    查詢: <input id="customer_search" type="text" name="" value="" placeholder="輸入消費者">
                </div>
                <div class="col-sm-8 col-xs-8">
                    從<input id="time_start" type="date" name="" value="">
                    至 <input id="time_end" type="date" name="" value="">
                    <button id="date_button" type="button" name="button" class=" btn btn-outline-info">查詢</button>
                </div>
            </div>
        </div>
        <br>
        <table class=" col-sm-12 col-xs-12 table-sm table-bordered text-center table-hover">
            <thead>
                <tr>
                    <th>日期</th>
                    <th>消費者</th>
                    <th>紀錄編號</th>
                </tr>
            </thead>
            <tbody id="record_tbody">
            </tbody>
        </table>
    </div>
    <div id="commodity" class="main_frame">
        <div class=" container ">
            <div class=" row ">
                <div class=" col-sm-6 col-xs-6">
                    查詢 : <input id="commodity_search" type="text" name="" value="" placeholder="輸入商品名">
                </div>
                <div class=" col-sm-3 col-xs-3">
                    <a id="remainder_order" href="#" >依庫存排序</a>
                </div>
                <div class=" col-sm-3 col-xs-3 ">
                    <h6 id="remainder_order_resulte"></h6>
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
                    <th>庫存</th>
                    <th>商品</th>
                    <th>照片</th>
                    <th>價格</th>
                    <th>庫存</th>
                </tr>
            </thead>
            <tbody id="good_show">
            </tbody>
        </table>
    </div>
    <div id="device" class="main_frame">
        <div id="hi" class="">

        </div>
        <select id="light" class="" name="">
            <option value="1">開燈</option>
            <option value="0">關燈</option>
        </select>
        <button onclick="turnlight()" type="button" name="button">開關</button>
    </div>
</body>
</html>
<?php }
}
