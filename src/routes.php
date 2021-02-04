<?php

return [
    '~^$~' => [\MyProject\Controllers\MainController::class, 'main'],
    '~^hide/(.*)$~' => [\MyProject\Controllers\MainController::class, 'hide'],
    '~^addQuantity/(.*)$~' => [\MyProject\Controllers\MainController::class, 'addQuantity'],
    '~^deleteQuantity/(.*)$~' => [\MyProject\Controllers\MainController::class, 'deleteQuantity'],
];