<?php

use Core\App;
use Core\Database;
use Core\Notes;

$db = App::resolve(Database::class);
$currentId = intval($_SESSION["user"]["id"]);
$notes = new Notes($db, $currentId);

$result = $notes->updateNote($_POST["id"], $_POST["body"], $currentId);

if ($result === true) {
    redirect("/notes");
} else {
    view("notes/edit.view.php", [
        "heading" => "Editar Anotação",
        "erros" => $result["erros"],
        "note" => $result["note"]
    ]);
}

