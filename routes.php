<?php 

//rotas App padrão
$router->get("/", "index.php");
$router->get("/about", "about.php");
$router->get("/contact", "contact.php");

//rota exibir
$router->get("/notes", "notes/index.php")->only("auth");
$router->get("/note", "notes/show.php");

//rota editar
$router->get("/note/edit", "notes/edit.php");
$router->patch("/note", "notes/update.php");

//rota deletar
$router->delete("/note", "notes/destroy.php");

//rota criar
$router->get("/notes/create", "/notes/create.php");
$router->post("/notes", "notes/store.php");


//rota registrar usuario
$router->get("/register", "registration/create.php")->only("guest");
$router->post("/register", "registration/store.php");

//rota de login do usuario
$router->get("/login", "session/create.php")->only("guest");
$router->post("/session", "session/store.php")->only("guest");
$router->delete("/session", "session/destroy.php");

//rota dashboard
$router->get("/dashboard", "dashboard.php")->only("auth");





