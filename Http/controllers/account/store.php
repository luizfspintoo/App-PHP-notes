<?php

use Core\Account;

$account = new Account();
$result = $account->UpdateAccount($_POST["id"], $_POST["password"]);

if($result) {
    view("account/account.view.php", [
        "erros" => $result
    ]);
}


