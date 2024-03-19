<?php

use Core\App;
use Core\Database;
use Core\Account;

$db = App::resolve(Database::class);
$account = new Account($db);

$account->UpdateAccount($_POST["id"], $_POST["password"]);

