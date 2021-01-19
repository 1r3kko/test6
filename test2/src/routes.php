<?php

return [
    '~^hello/(.*)$~' => [\MyProject\Controllers\MainController::class, 'sayHello'],
     '~^articles/(\d+)$~' => [\MyProject\Controllers\ArticlesController::class, 'view'],
     '~^articles/(\d+)/edit$~' => [\MyProject\Controllers\ArticlesController::class, 'edit'],
     '~^articles/(\d+)/delete$~' => [\MyProject\Controllers\ArticlesController::class, 'delete'],
      '~^articles/add$~' => [\MyProject\Controllers\ArticlesController::class, 'add'],
      '~^articles/(\d+)/comments$~' => [\MyProject\Controllers\ArticlesController::class, 'comments'],
      '~^comments/(\d+)/edit$~' => [\MyProject\Controllers\CommentsController::class, 'edit'],
      '~^users/register$~' => [\MyProject\Controllers\UsersController::class, 'signUp'],
    '~^$~' => [\MyProject\Controllers\MainController::class, 'main'],
    '~^users/(\d+)/activate/(.+)$~' => [\MyProject\Controllers\UsersController::class, 'activate'],
    '~^users/login~' => [\MyProject\Controllers\UsersController::class, 'login'],
    '~^users/exit~' => [\MyProject\Controllers\UsersController::class, 'exit'],
    '~^admins/(\d+)~' => [\MyProject\Controllers\AdminsController::class, 'view'],
];