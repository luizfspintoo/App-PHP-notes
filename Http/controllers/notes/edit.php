<?php

use Core\App;
use Core\Database;
use Core\Validator;

$db = App::resolve(Database::class);
<<<<<<< HEAD

=======
>>>>>>> 961ec5ae3316ee6c1aede1a9caded7d4278ed589
$id = $_GET["id"];

$note = $db->query("SELECT * FROM notes WHERE id = :id", ["id" => $id])->findOrFail();

view("notes/edit.view.php", [
    "heading" => "Editar Anotação",
    "note" => $note
]);