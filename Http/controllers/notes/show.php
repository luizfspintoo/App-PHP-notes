<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

$user_id = $_SESSION["user"]["id"];

$note = $db->query("SELECT * FROM notes WHERE id = :id", ["id" => $_GET["id"]])->findOrFail();

autorize($note["user_id"] === $user_id);

// renderiza a view
view("notes/show.view.php", [
    "heading" => "Minha Anotação",
    "note" => $note
]);
