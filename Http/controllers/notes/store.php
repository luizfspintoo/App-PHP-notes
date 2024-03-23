<?php

use Core\App;
use Core\Database;
use Core\Notes;

$db = App::resolve(Database::class);
$currentId = intval($_SESSION["user"]["id"]); 
$notes = new Notes($db, $currentId);

$result = $notes->createNote($_POST["body"]);

if ($result === true) {
    redirect("/notes");
} else {
    view("notes/create.view.php", [
        "heading" => "Criar Anotação",
        "erros" => $result
    ]);
}