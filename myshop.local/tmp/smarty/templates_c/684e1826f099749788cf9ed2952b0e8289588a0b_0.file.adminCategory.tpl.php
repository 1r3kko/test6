<?php
/* Smarty version 3.1.34-dev-7, created on 2020-08-05 11:16:20
  from 'D:\OpenServer5.3.7\OpenServer\domains\myshop.local\views\default\adminCategory.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5f2a6ad4cae1b6_82311576',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '684e1826f099749788cf9ed2952b0e8289588a0b' => 
    array (
      0 => 'D:\\OpenServer5.3.7\\OpenServer\\domains\\myshop.local\\views\\default\\adminCategory.tpl',
      1 => 1596615330,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5f2a6ad4cae1b6_82311576 (Smarty_Internal_Template $_smarty_tpl) {
?><h2>Категории</h2>
<table border="1" callpadding="1" cellspacing="1">
<tr>
<th>№</th>
<th>ID</th>
<th>Название</th>
<th>Родительская категория</th>
<th>Действие</th>
</tr>
<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['rsCategories']->value, 'item', false, NULL, 'categories', array (
  'iteration' => true,
));
$_smarty_tpl->tpl_vars['item']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->do_else = false;
$_smarty_tpl->tpl_vars['__smarty_foreach_categories']->value['iteration']++;
?>
<tr>
<td><?php echo (isset($_smarty_tpl->tpl_vars['__smarty_foreach_categories']->value['iteration']) ? $_smarty_tpl->tpl_vars['__smarty_foreach_categories']->value['iteration'] : null);?>
</td>
<td><?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
</td>
<td><input type="edit" id="itemName_<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
" /></td>
<td><select id="parentId_<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
">
<option value="0">Главная Категория
<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['rsMainCategories']->value, 'mainItem');
$_smarty_tpl->tpl_vars['mainItem']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['mainItem']->value) {
$_smarty_tpl->tpl_vars['mainItem']->do_else = false;
?>
<option value="<?php echo $_smarty_tpl->tpl_vars['mainItem']->value['id'];?>
" <?php if ($_smarty_tpl->tpl_vars['item']->value['parent_id'] == $_smarty_tpl->tpl_vars['mainItem']->value['id']) {?> selected<?php }?>><?php echo $_smarty_tpl->tpl_vars['mainItem']->value['name'];?>

<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
</select>
</td>
<td>
<input type="button" value="Сохранить" onclick="updateCat(<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
);"/></td>
</tr>
<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
</table><?php }
}
