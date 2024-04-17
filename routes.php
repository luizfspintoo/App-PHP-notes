<?php 

//rota App padrão
$router->get("/", "index.php");

//rota exibir
$router->get("/notes", "notes/index.php")->only("auth");
$router->get("/note", "notes/show.php")->only("auth");


//rota editar
$router->get("/note/edit", "notes/edit.php")->only("auth");
$router->patch("/note", "notes/update.php")->only("auth");


//rota deletar
$router->delete("/note", "notes/destroy.php")->only("auth");


//rota criar
$router->get("/notes/create", "/notes/create.php")->only("auth");
$router->post("/notes", "notes/store.php")->only("auth");


//rota registrar usuario
$router->get("/register", "registration/create.php")->only("guest");
$router->post("/register", "registration/store.php");


//rota de login do usuario
$router->get("/login", "session/create.php")->only("guest");
$router->post("/session", "session/store.php")->only("guest");
$router->delete("/session", "session/destroy.php");


//rota dashboard
$router->get("/dashboard", "/dashboard/dashboard.php")->only("auth");


//rota conta do usuario
$router->get("/account", "account/index.php")->only("auth");
$router->patch("/account", "account/store.php")->only("auth");


//rota feedback do usuario referente a plataforma
$router->get("/feedback", "feedback/index.php")->only("auth");
$router->post("/feedback", "feedback/store.php")->only("auth");






