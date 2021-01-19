<?php include __DIR__ . '/../header.php'; ?>
    <h1><?= $article->getName()?></h1>
    <p><?= $article->getParsedText() ?></p>
    <p>Автор: <?= $article->getAuthor()->getNickname() ?></p>
    <?php if($user): ?>
    <!-- && $user->isAdmin()): -->
    <a href="/articles/<?= $article->getId()?>/edit">Редактировать статью</a>
	<div style="text-align: center;">
		<form action="/articles/<?= $article->getId()?>/comments" method="post">
            <label for="author"><?=$user->getNickname()?></label><br>
        <textarea name="comment" id="comment" rows="10" cols="80"><?= $_POST['comment'] ?? '' ?></textarea><br>
        <br>
        <input type="submit" value="Создать">
        </form>
    </div>
        <?php else: ?>
        <h2>Для добавления комментария <a href="/users/login">войдите в аккаунт</a></h2>
        <?php endif; ?>
        <p><?php if (!$comments) :?>
        <p>Добавьте первый комментарий в этой статье </p>
    	<? else: 
        	foreach ($comments as $comment): ?></p>
        <h2><?= $comment->getAuthor()->getNickname()?></h2>
        <p name="comment<?= $comment->getId()?>"><?= $comment->getText() ?></p>
        <?php if ($user && (($user->getId()===$comment->getAuthor()->getId()) || $user->isAdmin())): ?>
        <a href="/comments/<?= $comment->getId()?>/edit">Редактировать комментарий</a>
    <? endif;?>
    <? endforeach;?>
    <? endif; ?>
<?php include __DIR__ . '/../footer.php'; ?>