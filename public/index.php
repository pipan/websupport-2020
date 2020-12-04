<?php

require_once '../vendor/autoload.php';

$app = Gasparik\Lib\Application\Application::boot(
    new Gasparik\App\ApplicationBootstrap()
);

$app->run();