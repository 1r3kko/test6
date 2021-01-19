<?php include __DIR__ . '/../header.php'; ?>
<?php if ($user &&  $user->isAdmin()): ?>
 <p><?php if (!$comments) :?>
        <p>Нет свежих комментариев </p>
    	<? else: 
        	foreach ($comments as $comment): ?></p>
        <h2><?= $comment->getAuthor()->getNickname()?></h2>
        <p name="comment<?= $comment->getId()?>"><?= $comment->getText() ?></p>
        <a href="/comments/<?= $comment->getId()?>/edit">Редактировать комментарий</a>
    <? endforeach;?>
    <? endif; ?>
    <? endif; ?>
<?php include __DIR__ . '/../footer.php'; ?>