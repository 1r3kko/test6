<?php include __DIR__ . '/../header.php'; ?>
<?php if ($user &&  $user->isAdmin()): ?>
<p><?php if (!$articles) :?>
        <p>Нет свежих статей </p>
        <? else: 
            foreach ($articles as $article): ?></p>
        <h2><?= $article->getName()?></h2>
        <p name="article<?= $article->getId()?>"><?= $article->getText() ?></p>
    <a href="/articles/<?= $article->getId()?>/edit">Редактировать статью</a>
    <? endforeach;?>
    <? endif; ?>
    <? endif;?>
<?php include __DIR__ . '/../footer.php'; ?>