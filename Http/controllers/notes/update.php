<?php

use Core\Notes;

$currentId = intval($_SESSION["user"]["id"]);
$notes = new Notes();

$result = $notes->updateNote($_POST["id"], $_POST["body"], $currentId);

if ($result) {
    redirect("/notes");
} else {
    view("notes/edit.view.php", [
        "heading" => "Editar Anotação",
        "erros" => $result
    ]);
}
