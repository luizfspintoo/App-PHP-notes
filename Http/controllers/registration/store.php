<?php

use Core\App;
use Core\Database;
use Core\UserRegistration;

$db = App::resolve(Database::class);
$userRegistration = new UserRegistration($db);
$result = $userRegistration->registerUser($_POST["email"], $_POST["password"]);

if ($result === true) {
    redirect("/dashboard");
} else {
    return view("registration/create.view.php", [
        "erros" => $result
    ]);
}