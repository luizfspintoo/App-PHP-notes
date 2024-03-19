<?php 

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);
$user_id = intval($_SESSION["user"]["id"]);

$notes = $db->query("SELECT * FROM notes WHERE user_id = :user_id", [
    "user_id" => $user_id
])->get();

view("notes/index.view.php", [
    "heading" => "Minhas Anotações",
    "notes" => $notes
]);