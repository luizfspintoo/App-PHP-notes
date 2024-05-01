<?php

use Core\Session;

view("feedback/index.view.php", [
    "erros" => Session::get("erros"),
    "name" => old("name"),
    "body" => old("body"),
]);