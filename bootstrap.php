<?php

use Core\App;
use Core\Container;
use Core\Database;
use Core\EmailProvider;

$container = new Container();

$container->bind("Core\Database", function () {
    return new Database();
});

$container->bind("Core\EmailProvider", function () {
    return new EmailProvider();
});

App::setContainer($container);
