<?php

// use Core\App;
// use Core\Database;
use Core\UserLogin;

//$db = App::resolve(Database::class);
$userLogin = new UserLogin();

$result = $userLogin->login($_POST["email"], $_POST["password"]);

redirect($result);