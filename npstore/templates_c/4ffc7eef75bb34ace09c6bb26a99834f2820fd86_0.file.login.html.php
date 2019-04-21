<?php
/* Smarty version 3.1.32, created on 2019-04-21 05:37:03
  from 'E:\xampp\htdocs\npstore\html\login.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32',
  'unifunc' => 'content_5cbbe55f029672_78283223',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '4ffc7eef75bb34ace09c6bb26a99834f2820fd86' => 
    array (
      0 => 'E:\\xampp\\htdocs\\npstore\\html\\login.html',
      1 => 1555817800,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5cbbe55f029672_78283223 (Smarty_Internal_Template $_smarty_tpl) {
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
    
    <style media="screen">
        .log_frame_div{
            padding-top: 5% ;
            width: 600px;
            height: 400px ;
            border-style: solid;
            border-radius: 10%/50%;
            background-color: #fcfcfc;
            position:absolute;
            text-align: center;
            left:50%;
            top:50%;
            
            margin-top:-200px;
            margin-left:-300px;
            
        }
        body{
            background-image: url('../logo/logo1.png');
            
            background-repeat: round;
        }
    </style>
    
    <?php echo '<script'; ?>
 type="text/javascript">
        $(function(){
            var $check = 0 ;
            $("#host_check").change(function(){
                $check = !$check ;
            });
            
            $("#log_btn").click(function(){
                if( $("#acc").val() && $("#pwd").val() ){
                    
                    if( $check ){
                        $.ajax({
                            method:'POST',
                            //url:'http://120.101.8.8/npstore/php/client.php' ,
                            url: 'http://localhost/npstore/php/client.php' ,
                            data: { action: 'log' , who:'host' , acc : $("#acc").val() , pwd : $("#pwd").val() } ,
                            success : function( check ){
                                if( check!=0 ){
                                    $("#host").attr("value",check ) ;
                                    $("#log_form").submit();
                                }else{
                                    alert("帳號或密碼錯誤");
                                };
                            }
                        })                    
                    }else{                        
                        $.ajax({
                            method:'POST',
                            //url:'http://120.101.8.8/npstore/php/client.php' ,
                            url: 'http://localhost/npstore/php/client.php' ,
                            data: { action: 'log' , who:'user' , acc : $("#acc").val() , pwd : $("#pwd").val() } ,
                            success : function( check ){
                                if( check!=0 ){
                                    $("#host").attr('value',check ) ;
                                    $("#log_form").submit();
                                }else{
                                    alert("帳號或密碼錯誤") ;  
                                };
                            }
                        })                
                    };
                    
                }else{
                    alert("帳號或密碼尚未輸入");
                };    
            });
            $("#leave").click(function(){
                window.location.href = '../web/index.php' ;
            });
        });
    <?php echo '</script'; ?>
>
    
</head>
<body>
    <div >
        <form id="log_form" class="" action="../web/login.php" method="post">
            <div id="container" align="center" class="container">
                <div class="log_frame_div">
                    <input type="text" id="acc" name="acc" value="" class="" placeholder="帳號" ><br><br>
                    <input type="password" id="pwd" name="pwd" class="" value="" placeholder="密碼"><br><br>
                    <input type="text" name="log" value="1" style="display:none;">
                    <input type="text" name="host" style="display:none;">
                    <input type="checkbox" id="host_check" name="host_check"><span style="font-size:1; color:#777">商家帳號</span><br><br>
                    <button type="button" id="log_btn" class=" btn btn-sm btn-outline-warning ">登入</button>
                    <button type="button" id="leave" name="button" class="btn btn-sm btn-outline-danger">取消</button>
                </div>
            </div>
        </form>
    </div>
    
</body>
</html><?php }
}
