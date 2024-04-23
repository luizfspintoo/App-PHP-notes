<?php

use Core\Feedback;

$feedback = new Feedback();
$currentId = intval($_SESSION["user"]["id"]);
$name = $_POST["name"];
$email = $_POST["email"];
$body = $_POST["body"];

$result = $feedback->createFeedback($name, $email, $body, $currentId);

view("feedback/index.view.php", [
    "erros" => $result
]);
