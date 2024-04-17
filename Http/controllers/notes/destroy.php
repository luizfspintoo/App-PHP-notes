<?php

use Core\Notes;

$currentId = intval($_SESSION["user"]["id"]);
$notes = new Notes();

$notes->deleteNoteById($_POST["id"], $currentId);




