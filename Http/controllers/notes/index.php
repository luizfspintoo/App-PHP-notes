<?php 

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);
$currentId = 1;

$notes = $db->query("SELECT * FROM notes WHERE user_id = :user_id", [
    "user_id" => $currentId
])->get();

view("notes/index.view.php", [
    "heading" => "Minhas Anotações",
    "notes" => $notes
]);