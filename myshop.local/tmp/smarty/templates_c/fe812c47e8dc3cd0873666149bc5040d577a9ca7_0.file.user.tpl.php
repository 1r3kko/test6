<?php
/* Smarty version 3.1.34-dev-7, created on 2020-08-02 12:36:18
  from 'D:\OpenServer5.3.7\OpenServer\domains\myshop.local\views\default\user.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5f2689123741b2_75667710',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'fe812c47e8dc3cd0873666149bc5040d577a9ca7' => 
    array (
      0 => 'D:\\OpenServer5.3.7\\OpenServer\\domains\\myshop.local\\views\\default\\user.tpl',
      1 => 1596360965,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5f2689123741b2_75667710 (Smarty_Internal_Template $_smarty_tpl) {
?><h1>Ваши регистрационные данные:</h1>
<table border="0">
<tr>
<td>Логин (email)</td>
<td><?php echo $_smarty_tpl->tpl_vars['arUser']->value['email'];?>
</td>
</tr>
<tr>
<td>Имя</td>
<td><input type="text" id="newName" value="<?php echo $_smarty_tpl->tpl_vars['arUser']->value['name'];?>
" /></td>
</tr>
<tr>
<td>Тел</td>
<td><input type="text" id="newPhone" value="<?php echo $_smarty_tpl->tpl_vars['arUser']->value['phone'];?>
"/></td>
</tr>
<tr>
<td>Адрес</td>
<td><textarea id="newAdress" /><?php echo $_smarty_tpl->tpl_vars['arUser']->value['adress'];?>
</textarea></td>
</tr>
<tr>
<td>Новый пароль</td>
<td><input type="password" id="newPwd1" value=""/></td>
</tr>
<tr>
<td>Повтор пароля</td>
<td><input type="password" id="newPwd2" value=""/></td>
</tr>
<tr>
<td>Для того, чтобы сохранить данные, введите текущий пароль</td>
<td><input type="password" id="curPwd" value=""/></td>
</tr>
<tr>
<td>&nbsp</td>
<td><input type="button" value="Сохранить изменения" onclick="updateUserData();"/></td>
</tr>
</table>

<h2>Заказы:</h2>
<?php if (!$_smarty_tpl->tpl_vars['rsUserOrders']->value) {?>
Нет заказов
<?php } else { ?>
<table border="1" callpadding="1" cellspacing="1">
<tr>
<th>№</th>
<th>Действие</th>
<th>ID заказа</th>
<th>Статус</th>
<th>Дата создания</th>
<th>Дата оплаты</th>
<th>Дополнительная информация</th>
</tr>
<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['rsUserOrders']->value, 'item', false, NULL, 'orders', array (
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
');return false;">Показать товар заказа</td>
<td><?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
</td>
<td><?php echo $_smarty_tpl->tpl_vars['item']->value['status'];?>
</td>
<td><?php echo $_smarty_tpl->tpl_vars['item']->value['date_created'];?>
</td>
<td><?php echo $_smarty_tpl->tpl_vars['item']->value['date_payment'];?>
&nbsp</td>
<td><?php echo $_smarty_tpl->tpl_vars['item']->value['comment'];?>
</td>
</tr>

<tr class="hideme" id="purchasesForOrderId_<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
">
<td colspan="7">
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
));
$_smarty_tpl->tpl_vars['itemChild']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['itemChild']->value) {
$_smarty_tpl->tpl_vars['itemChild']->do_else = false;
?>
<tr>
<td><?php echo (isset($_smarty_tpl->tpl_vars['__smarty_foreach_orders']->value['iteration']) ? $_smarty_tpl->tpl_vars['__smarty_foreach_orders']->value['iteration'] : null);?>
</td>
<td><?php echo $_smarty_tpl->tpl_vars['itemChild']->value['product_id'];?>
</td>
<td><a href="/www/product/<?php echo $_smarty_tpl->tpl_vars['itemChild']->value['product_id'];?>
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
