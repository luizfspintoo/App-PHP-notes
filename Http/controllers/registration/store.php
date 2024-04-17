<?php

// use Core\App;
// use Core\Database;
use Core\UserRegistration;

$userRegistration = new UserRegistration();
$result = $userRegistration->registerUser($_POST["email"], $_POST["password"]);

view("registration/create.view.php", [
    "erros" => $result
]);

