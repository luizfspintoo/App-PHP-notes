<?php

use Core\App;
use Core\Database;
use Core\Feedback;

$db = App::resolve(Database::class);
$currentId = 1;

$feedback = new Feedback($db, $currentId);
$result = $feedback->createFeedback($_POST["body"]);

if ($result === true) {
    redirect("/dashboard");
} else {
    $erros = $result;
    view("feedback/index.view.php", [
        "erros" => $erros
    ]);
}