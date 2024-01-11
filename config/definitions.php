<?php

$path = require(__DIR__ . "/definitions/path.php");
$core = require(__DIR__ . "/definitions/core.php");
$repository = require(__DIR__ . "/definitions/repository.php");
$renderer = require(__DIR__ . "/definitions/renderer.php");

return array_merge(
    $path,
    $core,
    $repository,
    $renderer
);
