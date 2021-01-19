<?php include __DIR__ . '/../header.php'; ?>
<?php if ($user &&  $user->isAdmin()): ?>
    <a href="/admins/1">Свежие статьи</a>
    <a href="/admins/2">Свежие комментарии</a>
    <? endif; ?>
<?php include __DIR__ . '/../footer.php'; ?>