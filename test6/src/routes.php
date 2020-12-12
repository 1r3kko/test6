<?php

return [
    '~^$~' => [\MyProject\Controllers\MainController::class, 'main'],
    '~^day/(.*)$~' => [\MyProject\Controllers\MainController::class, 'day'],
];