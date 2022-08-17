<?php
/* Smarty version 4.1.1, created on 2022-07-25 12:26:20
  from 'C:\xampp\htdocs\artykuly\templates\base.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.1.1',
  'unifunc' => 'content_62de6fcc906125_85020774',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '01906a3907511c25aa7f32d8e0e16ad879a1fb64' => 
    array (
      0 => 'C:\\xampp\\htdocs\\artykuly\\templates\\base.tpl',
      1 => 1658744760,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_62de6fcc906125_85020774 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, false);
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
</head>

<body>
    <?php ob_start();
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_122584357862de6fcc8f5a62_76375809', "content");
$_prefixVariable1 = ob_get_clean();
echo $_prefixVariable1;?>

    <?php echo '<script'; ?>
 src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous">
    <?php echo '</script'; ?>
>
</body>

</html><?php }
/* {block "content"} */
class Block_122584357862de6fcc8f5a62_76375809 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_122584357862de6fcc8f5a62_76375809',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
}
}
/* {/block "content"} */
}
