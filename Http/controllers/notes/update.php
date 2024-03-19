<?php

use Core\App;
use Core\Database;
use Core\Validator;

$db = App::resolve(Database::class);
$erros = [];
$user_id = $_SESSION["user"]["id"];

$note = $db->query("SELECT * FROM notes WHERE id = :id", ["id" => $_POST["id"]])->findOrFail();

autorize($note["user_id"] === $user_id);

if (! Validator::string($_POST["body"], 10, 255)) {
    $erros["body"] = "Campo obrigatório, e permite 255 caracteres";
}

if (count($erros)) {
    return view("notes/edit.view.php", [
        "heading" => "Editar anotação",
        "erros" => $erros,
        "note" => $note
    ]);
}

$db->query("UPDATE notes SET body = :body WHERE id = :id", [
    "id" => $_POST["id"],
    "body" => $_POST["body"]
]);

redirect("/notes");

