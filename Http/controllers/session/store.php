<?php

use Core\Authenticator;
use Core\Session;
use Http\Form\LoginForm;
use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

$email = $_POST["email"];
$password = $_POST["password"];

$form = new LoginForm();

if ($form->validate($email, $password)) {
    if((new Authenticator)->attempt($email, $password)) {
        sleep(1);
        
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
