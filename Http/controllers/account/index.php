<?php

use Core\App;
use Core\Database;
use Core\Account;

$db = App::resolve(Database::class);
$currentId = intval($_SESSION["user"]["id"]);
$account = new Account($db);

$userAccount = $account->getUserAccount($currentId);

view("account/account.view.php", [
    "userAccount" => $userAccount[0]
]);