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

if (! Validator::string($password, 10, 15)) {
    $erros["password"] = "Senha invalida, minino 10 caracteres";
}

if (! empty($erros)) {
    return view("registration/create.view.php", [
        "erros" => $erros
    ]);
}

$user = $db->query("SELECT * FROM users WHERE email = :email", [
    "email" => $email
])->find();

if ($user) {

    $user_id = $db->lastInsertId();

    //cria sessão para usuario
    $_SESSION["user"] = [
<<<<<<< HEAD
        "id" => $user_id,
        "email" => $email
    ];


=======
        "user_id" => $user_id,
        "email" => $email
    ];

>>>>>>> 961ec5ae3316ee6c1aede1a9caded7d4278ed589
    redirect("/dashboard");
} else {
    $db->query("INSERT INTO users (email, password) VALUES (:email, :password)", [
        "email" => $email,
        "password" => password_hash($password, PASSWORD_BCRYPT) //senha mais segura (criptografada no banco)
    ]);

    $user_id = $db->lastInsertId();

    //cria sessão para usuario
    $_SESSION["user"] = [
<<<<<<< HEAD
        "id" => $user_id,
=======
        "user_id" => $user_id,
>>>>>>> 961ec5ae3316ee6c1aede1a9caded7d4278ed589
        "email" => $email
    ];

    sleep(1);
    redirect("/dashboard");
}