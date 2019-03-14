<?php
/* Smarty version 3.1.32, created on 2019-03-12 15:00:54
  from 'E:\xampp\htdocs\npstore\html\index.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32',
  'unifunc' => 'content_5c87bb967cca71_80691269',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e18c07111acd57ddded28cb88b3a2edb0f7717a3' => 
    array (
      0 => 'E:\\xampp\\htdocs\\npstore\\html\\index.html',
      1 => 1552399253,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5c87bb967cca71_80691269 (Smarty_Internal_Template $_smarty_tpl) {
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
                $("#logrow").hide() ;
                $("#member_link").show() ;    
            };
        });
    <?php echo '</script'; ?>
>
</head>
<body>
    <div class=" container ">
        <div class="row">
            <div class="col-sm-3 col-xs-3">
                NP!store 無人商店
            </div>
            <div id="logrow" class="col-sm col-xs">
                <input type="text" name="" value="" class="" placeholder="帳號" >
                <input type="password" name="" class="" value="" placeholder="密碼">
                <input type="checkbox" name="" value=""><span style="font-size:1; color:#777">商家帳號</span>
                <button type="button" name="button" class="float-right btn btn-sm btn-outline-warning ">登入</button>
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
                            熱門商品
                        </a> 
                    </li>
                    <li>
                        <a href="#">
                            促銷活動
                        </a>
                    </li>
                    <li>
                        <a id="member_link" href="../web/host.php" style="visibility:hidden;">
                            會員帳號
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
