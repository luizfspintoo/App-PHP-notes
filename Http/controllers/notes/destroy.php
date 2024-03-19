<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);
$currentId = 1;

$note = $db->query("SELECT * FROM notes WHERE id = :id", ["id" => $_POST["id"]])->findOrFail();

autorize($note["user_id"] === $currentId);

$db->query("DELETE FROM notes WHERE id = :id", ["id" => $_POST["id"]]);

redirect("/notes");


