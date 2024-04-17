<?php

use Core\Feedback;

$feedback = new Feedback();
$currentId = intval($_SESSION["user"]["id"]);

$result = $feedback->createFeedback($_POST["body"], $currentId);

view("feedback/index.view.php", [
    "erros" => $result
]);
