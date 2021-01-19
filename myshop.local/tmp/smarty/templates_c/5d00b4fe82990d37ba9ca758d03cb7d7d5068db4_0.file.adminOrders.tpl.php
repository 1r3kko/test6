<?php
/* Smarty version 3.1.34-dev-7, created on 2020-08-06 20:42:56
  from 'D:\OpenServer5.3.7\OpenServer\domains\myshop.local\views\default\adminOrders.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5f2c41202d47c3_83075111',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '5d00b4fe82990d37ba9ca758d03cb7d7d5068db4' => 
    array (
      0 => 'D:\\OpenServer5.3.7\\OpenServer\\domains\\myshop.local\\views\\default\\adminOrders.tpl',
      1 => 1596735772,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5f2c41202d47c3_83075111 (Smarty_Internal_Template $_smarty_tpl) {
?><h2>Заказы</h2>
<?php if (!$_smarty_tpl->tpl_vars['rsOrders']->value) {?>
Нет заказов
<?php } else { ?>
<table border="1" callpadding="1" cellspacing="1">
<caption>Редактировать</caption>
<tr>
<th>№</th>
<th>Действие</th>
<th>ID заказа</th>
<th width="110">Статус</th>
<th>Дата создания</th>
<th>Дата оплаты</th>
<th>Дополнительная информация</th>
<th>Дата изменения заказа</th>
</tr>
<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['rsOrders']->value, 'item', false, NULL, 'orders', array (
  'iteration' => true,
));
$_smarty_tpl->tpl_vars['item']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->do_else = false;
$_smarty_tpl->tpl_vars['__smarty_foreach_orders']->value['iteration']++;
?>
<tr>
<td><?php echo (isset($_smarty_tpl->tpl_vars['__smarty_foreach_orders']->value['iteration']) ? $_smarty_tpl->tpl_vars['__smarty_foreach_orders']->value['iteration'] : null);?>
</td>
<td><a href="#" onclick="showProducts('<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
'); return false;" >Показать товар заказа</a></td>
<td><?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
</td>
<td>
<input type="checkbox" id="itemStatus_<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
"<?php if ($_smarty_tpl->tpl_vars['item']->value['status']) {?> checked="checked"<?php }?> onclick="updateOrderStatus('<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
');"/>Закрыт
</td>
<td><?php echo $_smarty_tpl->tpl_vars['item']->value['date_created'];?>
</td>
<td>
<input id="datePayment_<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" type="text" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['date_payment'];?>
"/>
<input type="button" value="Сохранить" onclick="updateDatePayment('<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
');"/> 
</td>
<td><?php echo $_smarty_tpl->tpl_vars['item']->value['comment'];?>
</td>
<td><?php echo $_smarty_tpl->tpl_vars['item']->value['date_modification'];?>
</td>
</tr>

<tr class="hideme" id="purchaseForOrderId_<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
">
<td colspan="8">
<?php if ($_smarty_tpl->tpl_vars['item']->value['children']) {?>
<table border="1" callpadding="1" cellspacing="1" width="100%">
<tr>
<th>№</th>
<th>ID</th>
<th>Название</th>
<th>Цена</th>
<th>Количество</th>
</tr>
<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['item']->value['children'], 'itemChild', false, NULL, 'products', array (
  'iteration' => true,
));
$_smarty_tpl->tpl_vars['itemChild']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['itemChild']->value) {
$_smarty_tpl->tpl_vars['itemChild']->do_else = false;
$_smarty_tpl->tpl_vars['__smarty_foreach_products']->value['iteration']++;
?>
<tr>
<td><?php echo (isset($_smarty_tpl->tpl_vars['__smarty_foreach_products']->value['iteration']) ? $_smarty_tpl->tpl_vars['__smarty_foreach_products']->value['iteration'] : null);?>
</td>
<td><?php echo $_smarty_tpl->tpl_vars['itemChild']->value['id'];?>
</td>
<td><a href="/www/product/<?php echo $_smarty_tpl->tpl_vars['itemChild']->value['id'];?>
/"><?php echo $_smarty_tpl->tpl_vars['itemChild']->value['name'];?>
</a></td>
<td><?php echo $_smarty_tpl->tpl_vars['itemChild']->value['price'];?>
</td>
<td><?php echo $_smarty_tpl->tpl_vars['itemChild']->value['amount'];?>
</td>
</tr>
<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
</table>
<?php }?>
</td>
</tr>
<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
</table>
<?php }
}
}
