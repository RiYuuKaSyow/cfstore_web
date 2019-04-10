<?php
/* Smarty version 3.1.32, created on 2019-04-06 07:45:59
  from 'E:\xampp\htdocs\npstore\html\index.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32',
  'unifunc' => 'content_5ca83d1724ca75_13155997',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e18c07111acd57ddded28cb88b3a2edb0f7717a3' => 
    array (
      0 => 'E:\\xampp\\htdocs\\npstore\\html\\index.html',
      1 => 1553087203,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5ca83d1724ca75_13155997 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="zh">
<head>
    <meta http-equiv="UserContent-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="cache-control" content="no-cache">
    <meta http-equiv="pragma" content="no-cache">
    <meta http-equiv="expires" content="0">
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
    <style type="text/css">
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
    </style>
    <?php echo '<script'; ?>
 type="text/javascript">
        $(function(){
                        
            if( <?php echo $_smarty_tpl->tpl_vars['login']->value;?>
 ){
                $("#log_frame").hide() ;
                $("#member_link").show() ;  
                $("#log_out").show();
            };      
            $("#log_out").click(function(){
                window.location.href = '../web/index.php?log=0' ;
            });
        });
    <?php echo '</script'; ?>
>
</head>
<body>
    <div class=" container ">
        <div class="row">
            <div class="col-sm-3 col-xs-3">
                <a href="../web/index.php">
                    <img src="../logo/logo1.png" width="75%" height="75%" alt="">
                </a>
            </div>
            <div id="logrow" class="col-sm col-xs">
                <form id="log_frame" class="" action="../web/login.php" method="post">
                    <button type="submit" id="log_btn" class="float-right btn btn-sm btn-outline-warning ">登入</button>
                </form>
                <button type="submit" id="log_out" class="float-right btn btn-sm btn-outline-warning "name="log_out" style="display:none;">登出</button>
            </div>
        </div>
        <div class="container bg-warning">
                <ul class="nav navbar list-inline">
                    <li>
                        <a class="disabled" style="color:#f0f0f0 ;">
                            網頁導覽列
                        </a>
                    </li>
                    <li> 
                        <a href="#">
                            消息專區
                        </a> 
                    </li>
                    <li>
                        <a href="#">
                            商品專區
                        </a>
                    </li>
                    <li>
                        <a id="member_link" href="../web/host.php">
                            會員專區
                        </a>
                    </li>
                </ul>
            
        </div>
        <div id="main_frame" class="">
            nothing now <br>
            comming soon
        </div>
    </div>
</body>
</html><?php }
}
