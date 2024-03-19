<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);
$user_id = intval($_SESSION["user"]["id"]);

$note = $db->query("SELECT * FROM notes WHERE id = :id", ["id" => $_POST["id"]])->findOrFail();

autorize($note["user_id"] === $user_id);

$db->query("DELETE FROM notes WHERE id = :id", ["id" => $_POST["id"]]);

redirect("/notes");


