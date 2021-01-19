<?php
/* Smarty version 3.1.34-dev-7, created on 2020-07-29 18:09:49
  from 'D:\OpenServer5.3.7\OpenServer\domains\myshop.local\views\default\cart.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5f21913dcd5568_64339351',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '1f5ff10aba7756b0a854c9d8a219e81c3148cee1' => 
    array (
      0 => 'D:\\OpenServer5.3.7\\OpenServer\\domains\\myshop.local\\views\\default\\cart.tpl',
      1 => 1596035153,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5f21913dcd5568_64339351 (Smarty_Internal_Template $_smarty_tpl) {
?><h1>Корзина</h1>

<?php if (!$_smarty_tpl->tpl_vars['rsProducts']->value) {?>
В корзине пусто
<?php } else { ?>
<form action="/www/cart/order/" method="POST">
<h2>Данные заказа</h2>
<table>
<tr>
<td>
№
</td>
<td>
Наименование
</td>
<td>
Количество
</td>
<td>
Цена за единицу
</td>
<td>
Цена
</td>
<td>
Действие
</td>
</tr>
<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['rsProducts']->value, 'item', false, NULL, 'products', array (
  'iteration' => true,
));
$_smarty_tpl->tpl_vars['item']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->do_else = false;
$_smarty_tpl->tpl_vars['__smarty_foreach_products']->value['iteration']++;
?>
<tr>
<td>
<?php echo (isset($_smarty_tpl->tpl_vars['__smarty_foreach_products']->value['iteration']) ? $_smarty_tpl->tpl_vars['__smarty_foreach_products']->value['iteration'] : null);?>

</td>
<td>
<a href="/www/product/<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
/"><?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
</a><br />
</td>
<td>
<input name="itemCnt_<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" id="itemCnt_<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" type="text" value="1" onchange="conversionPrice(<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
);"/>
</td>
<td>
<span id="itemPrice_<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['price'];?>
">
<?php echo $_smarty_tpl->tpl_vars['item']->value['price'];?>

</span>
</td>
<td>
<span id="itemRealPrice_<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
">
<?php echo $_smarty_tpl->tpl_vars['item']->value['price'];?>

</span>
</td>
<td>
<a id="removeCart_<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" href="#" onClick="removeFromCart(<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
); return false;" title="Удалить из корзины">Удалить</a>
<a id="addCart_<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
"class="hideme" href="#" onClick="addToCart(<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
); return false;" title="Восстановить элемент">Восстановить</a>
</td>
</tr>
<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
</table>
<input type="submit" value="Оформить заказ"/>
</form>
<?php }
}
}
