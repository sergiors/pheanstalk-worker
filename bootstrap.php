<?php
if (!$loader = require_once __DIR__.'/vendor/autoload.php') {
    throw new \RuntimeException('You need to install dependencies using Composer.');
}
