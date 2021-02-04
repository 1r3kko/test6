<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="/styles.css">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script type="text/javascript" src="/js/jquery-3.5.1.min.js"></script>
    <script type="text/javascript" src="/js/main.js"></script>
</head>
<body>
<table class="layout">
    <tr><td>ID</td><td>PRODUCT_ID</td><td>PRODUCT_NAME</td>
        <td>PRODUCT_PRICE</td><td>PRODUCT_ARTICLE</td><td>PRODUCT_QUANTITY</td>
        <td>DATE_CREATE</td><td>ВИДИМОСТЬ</td></tr>
<?php
foreach ($products as $product):
    if($product->getVisibility()==1): ?>
    <tr id="hideProduct_<?=$product->getId();?>"><td><?= $product->getId(); ?></td>
    <td><?= $product->getProductId(); ?></td>
    <td><?= $product->getName(); ?></td>
    <td><?= $product->getPrice(); ?></td>
    <td><?= $product->getArticle(); ?></td>
        <td><span id="quantity_<?=$product->getId();?>"><?= $product->getQuantity(); ?></span>
        <a href="#" onClick="addQuantity(<?=$product->getId();?>); return false;" alt="Добавить продукт">(+)</a>
        <a href="#" onClick="deleteQuantity(<?=$product->getId();?>); return false;" alt="Удалить продукт">(-)</a></td>
    <td><?= $product->getDate(); ?></td>
    <td><a href="#" onClick="hideProduct(<?=$product->getId();?>); return false;" alt="Скрыть">Скрыть</a></td></tr>
<?php endif; endforeach; ?>
</table>
</body>
</html>