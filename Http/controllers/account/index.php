<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);
$cuurentId = 1;

$userAccount = $db->query("SELECT * FROM users WHERE id = :id",[
    "id" => $cuurentId
])->get();

view("account/account.view.php", [
    "userAccount" => $userAccount[0]
]);