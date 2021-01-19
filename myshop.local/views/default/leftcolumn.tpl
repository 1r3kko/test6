{*левый столбец*}
<div id="leftColumn">
	<div id="dropdown">
	<div id="leftMenu">
		<!--если будет ошибка, раскомментируй 6 строчку и перемести </div> после </span></button>:
		<div class="menuCaption"></div>
		!-->
			<button class="btn btn-success dropdown-toggle" data-toggle="dropdown">Меню:<span class="caret"></span></button>
			<ul class="dropdown-menu"> 
		{foreach $rsCategories as $item}
		<li ><a href="/?controller=category&id={$item['id']}">{$item['name']}</a><br /></li>

		{if isset($item['children'])}
		{foreach $item['children'] as $itemChild}
		<ul><li><a href="/?controller=category&id={$itemChild['id']}">{$itemChild['name']}</a><br /></li></ul>
		{/foreach}
		{/if}
		{/foreach}
	</ul>
	</div>
</div>

{if isset($arUser)}
    <div id="userBox">
	<a href="/user/" id="userLink">{$arUser['displayName']}</a><br /><br />
	<a href="/user/logout/" onclick="logout();">Выход</a>
	</div>
{else}
	<div id="userBox" class="hideme">
	<a href="#" id="userLink"></a><br />
	<a href="/user/logout/" onclick="logout();">Выход</a>
	</div>

	{if !isset($hideLoginBox)}
	<div id="loginBox">
		<div class="menuCaption">Авторизация</div>
		<input type="text" id="loginEmail" name="loginEmail" value=""/><br />
		<input type="password" id="loginPwd" name="loginPwd" value=""/><br />
		<input type="button" onclick="login();" value="Войти"/>
	</div>

    <div id="registerBox">
		<div class="menuCaption showHidden" onclick="showRegisterBox();">Регистрация</div>
		<div id="registerBoxHidden">
		email: <br />
		<input type="text" id="email" name="email" value=""/><br />
		пароль: <br />
		<input type="password" id="pwd1" name="pwd1" value=""/><br />
		повторить пароль: <br />
		<input type="password" id="pwd2" name="pwd2" value=""/><br />
		<input type="button" onclick="registerNewUser();" value="Зарегистрироваться"/>
		</div>	
	</div>
	{/if}
{/if}
	<div class="menuCaption">Корзина</div>
	<a href="/cart/" title="Перейти в корзину">В корзине</a>
	<span id="cartCntItems">
	{if $cartCntItems > 0}{$cartCntItems}{else}пусто{/if}
	</span>
</div>