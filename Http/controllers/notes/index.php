<?php 

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);
<<<<<<< HEAD
$user_id = isset($_SESSION["user"]["id"]);
=======
$user_id = intval($_SESSION["user"]["id"]);
>>>>>>> 961ec5ae3316ee6c1aede1a9caded7d4278ed589

$notes = $db->query("SELECT * FROM notes WHERE user_id = :user_id", [
    "user_id" => $user_id
])->get();

view("notes/index.view.php", [
    "heading" => "Minhas Anotações",
    "notes" => $notes
]);