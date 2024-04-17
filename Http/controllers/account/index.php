<?php

use Core\Account;

$currentId = intval($_SESSION["user"]["id"]);
$account = new Account();

$userAccount = $account->getUserAccount($currentId);

view("account/account.view.php", [
    "userAccount" => $userAccount
]);
