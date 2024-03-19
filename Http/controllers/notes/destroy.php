<?php

use Core\App;
use Core\Database;
use Core\Notes;

$db = App::resolve(Database::class);
$notes = new Notes($db, $currentId = 1);

$notes->deleteNoteById($_POST["id"], $currentId = 1);




