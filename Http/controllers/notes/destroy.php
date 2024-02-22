<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

$currentUserId = 14;

$note = $db->query("SELECT * FROM notes WHERE id = :id", ["id" => $_POST["id"]])->findOrFail();

autorize($note["user_id"] === $currentUserId);

$db->query("DELETE FROM notes WHERE id = :id", ["id" => $_POST["id"]]);

header("location: /notes");
exit();


