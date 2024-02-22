<?php 

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

$notes = $db->query("SELECT * FROM notes WHERE user_id = 14")->get();

view("notes/index.view.php", [
    "heading" => "Minhas Anotações",
    "notes" => $notes
]);