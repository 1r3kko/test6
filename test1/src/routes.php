<?php

return [
    '~^$~' => [\MyProject\Controllers\MainController::class, 'main'],
    '~^editEmployee/(.*)$~' => [\MyProject\Controllers\MainController::class, 'editEmployee'],
    '~^deleteEmployee/(.*)$~' => [\MyProject\Controllers\MainController::class, 'deleteEmployee'],
    '~^editJob/(.*)$~' => [\MyProject\Controllers\MainController::class, 'editJob'],
    '~^addJob/(.*)$~' => [\MyProject\Controllers\MainController::class, 'addJob'],
    '~^deleteJob/(.*)$~' => [\MyProject\Controllers\MainController::class, 'deleteJob'],
    '~^updateEmployee/(.*)$~' => [\MyProject\Controllers\MainController::class, 'updateEmployee'],
    '~^addEmployee/(.*)$~' => [\MyProject\Controllers\MainController::class, 'addEmployee'],
    '~^insert/(.*)$~' => [\MyProject\Controllers\MainController::class, 'insert'],
    '~^updateJob/(.*)$~' => [\MyProject\Controllers\MainController::class, 'updateJob'],
    '~^previousJob/(.*)$~' => [\MyProject\Controllers\MainController::class, 'previousJob'],
];