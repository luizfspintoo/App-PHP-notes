<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

$userAccount = $db->query("SELECT * FROM users WHERE id = 1")->get();

view("account/account.view.php", [
    "userAccount" => $userAccount[0]
]);