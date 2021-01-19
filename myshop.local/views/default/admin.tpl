<div id="blockNewCategory">
Новая категория:
<input name="newCategoryName" id="newCategoryName" type="text" value="" />
<br />
Является подкатегорией для 
<select name="generalCatId">
<option value="0">Главная Категория
{foreach $rsCategories as $item}
<option value="{$item['id']}">{$item['name']}
{/foreach}
</select>
<br />
<input type="button" onclick="newCategory();" value="Добавить категорию" />
</div>	