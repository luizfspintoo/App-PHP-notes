<?php

use Core\App;
use Core\Database;
use Core\Notes;

$db = App::resolve(Database::class);
$currentId = intval($_SESSION["user"]["id"]);
$notes = new Notes($db, $currentId);

$notes->deleteNoteById($_POST["id"], $currentId);




