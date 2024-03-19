<?php

use Core\Authenticator;
use Core\Session;
use Http\Form\LoginForm;
use Core\Database;
use Core\App;

$db = App::resolve(Database::class);

$email = $_POST["email"];
$password = $_POST["password"];

$form = new LoginForm();

if ($form->validate($email, $password)) {
    if((new Authenticator)->attempt($email, $password)) {
        sleep(1);

        $user_id = $db->lastInsertId();

        //cria sessão para usuario
        $_SESSION["user"] = [
            "user_id" => $user_id,
            "email" => $email
        ];

        redirect("/dashboard");
    } else {
        $form->erro("email", "Email ou senha estão incorretos");
    }
}

Session::flash("erros", $form->erros());

Session::flash("old", [
    "email" => $_POST["email"]
]);

return redirect("/login");
