<?php
/* Smarty version 3.1.32, created on 2019-01-23 08:05:54
  from 'E:\xampp\htdocs\html\boss.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32',
  'unifunc' => 'content_5c481252dbfe08_91471289',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '7c3dfd9e81ca3541e913229670d405bf844c74bd' => 
    array (
      0 => 'E:\\xampp\\htdocs\\html\\boss.html',
      1 => 1548227153,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5c481252dbfe08_91471289 (Smarty_Internal_Template $_smarty_tpl) {
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
        #exit{
            margin-top: 100px;
        }
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
        #exit{
            margin-top: 100px;
        }
        .main_frame{
            position: relative;
            left:15%;
            height: 700px;
            width: 80%;
            border-style: none;
            display: none;
        }
    </style>
    <?php echo '<script'; ?>
 type="text/javascript">
        $(function(){
            if( <?php echo $_smarty_tpl->tpl_vars['page']->value;?>
 == 1 ){
                $("#status").toggle();
            }else if ( <?php echo $_smarty_tpl->tpl_vars['page']->value;?>
 == 2 ) {
                $("#record").show();
            }else if ( <?php echo $_smarty_tpl->tpl_vars['page']->value;?>
 == 3 ) {
                $("#commodity").show();
            }else if ( <?php echo $_smarty_tpl->tpl_vars['page']->value;?>
 == 4 ) {
                $("#device").show();
            };
            $("#exit").click(function(){
                window.location.href = '../index.php' ;
            });
        });
    <?php echo '</script'; ?>
>
</head>
<body>
    <div id="option" >
        <ul>
            <li>
                <a href="?page=1">商店狀況</a>
            </li>
            <li>
                <a href="?page=2">消費紀錄</a>
            </li>
            <li>
                <a href="?page=3">商品資訊</a>
            </li>
            <li>
                <a href="?page=4">開關控制</a>
            </li>

            <div id='exit'>
                <button class="btn-outline-danger btn" type="button" name="button">
                    離開
                </button>
            </div>
        </ul>
    </div>
    <div id="status" class="main_frame">
        <img src="../img/img1.jpg" alt="">
    </div>
    <div id="record" class="main_frame">
        <img src="../img/img2.jpg" alt="">
    </div>
    <div id="commodity" class="main_frame">
        <img src="../img/png2.png" alt="">
    </div>
    <div id="device" class="main_frame">
        <img src="../img/pistar.jpg" alt="">
    </div>
</body>
</html>
<?php }
}
