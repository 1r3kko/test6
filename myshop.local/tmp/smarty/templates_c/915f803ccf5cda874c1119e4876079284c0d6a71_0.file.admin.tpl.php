<?php
/* Smarty version 3.1.34-dev-7, created on 2020-08-04 12:17:13
  from 'D:\OpenServer5.3.7\OpenServer\domains\myshop.local\views\default\admin.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5f2927994f04f4_29203267',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '915f803ccf5cda874c1119e4876079284c0d6a71' => 
    array (
      0 => 'D:\\OpenServer5.3.7\\OpenServer\\domains\\myshop.local\\views\\default\\admin.tpl',
      1 => 1596532486,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5f2927994f04f4_29203267 (Smarty_Internal_Template $_smarty_tpl) {
?><div id="blockNewCategory">
Новая категория:
<input name="newCategoryName" id="newCategoryName" type="text" value="" />
<br />
Является подкатегорией для 
<select name="generalCatId">
<option value="0">Главная Категория
<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['rsCategories']->value, 'item');
$_smarty_tpl->tpl_vars['item']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->do_else = false;
?>
<option value="<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>

<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
</select>
<br />
<input type="button" onclick="newCategory();" value="Добавить категорию" />
</div>	<?php }
}
