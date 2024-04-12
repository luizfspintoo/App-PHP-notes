<?php

use Core\Session;

view("session/create.view.php", [
    "erros" => Session::get("erros"),
    "email" => old("email")
]);
