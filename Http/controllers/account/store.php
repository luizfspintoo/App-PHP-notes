<?php

use Core\App;
use Core\Database;
use Core\Validator;

$db = App::resolve(Database::class);

$email = $_POST["email"];
$password = $_POST["password"];

$erros = [];

if (! Validator::email($email)) {
    $erros["email"] = "Este email não é valído";
}

if (! Validator::string($password, 10, 20)) {
    $erros["password"] = "Senha invalida, minino 10 caracteres";
}

if (! empty($erros)) {
    return view("account/account.view.php", [
        "erros" => $erros
    ]);
}

$user = $db->query("SELECT * FROM users WHERE email = :email", [
    "email" => $email
])->find();


if ($user) {
    $db->query("UPDATE users SET password = :password WHERE id = :id", [
        "id" => $_POST["id"],
        "password" => password_hash($password, PASSWORD_BCRYPT)
    ]);

    sleep(1);
    redirect("/dashboard");
} else {
    $db->query("UPDATE users SET email = :email, password = :password WHERE id = :id", [
        "id" => $_POST["id"],
        "email" => $email,
        "password" => password_hash($password, PASSWORD_BCRYPT)
    ]);

    //cria sessão para usuario
    $_SESSION["user"] = [
        "email" => $email
    ];

    sleep(1);
    redirect("/dashboard");
}