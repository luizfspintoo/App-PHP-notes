<?php

namespace Core;

class Model 
{
    //class that use this method: Authenticator, UserRegistration
    public function findUser($email)
    {
        $databaseHandler = new DatabaseHandler(App::resolve(Database::class));

        return $databaseHandler->query("SELECT * FROM users WHERE email = :email", [
            "email" => $email
        ])->find();
    }

    //class that use this method: UserRegistration
    public function registerUser($email, $password)
    {
        $databaseHandler = new DatabaseHandler(App::resolve(Database::class));

        return $databaseHandler->query("INSERT INTO users (email, password) VALUES (:email, :password)", [
            "email" => $email,
            "password" => password_hash($password, PASSWORD_BCRYPT)
        ])->lastId();
    }

    //class that use this method: Notes
    public function allNotes($currentId)
    {
        $databaseHandler = new DatabaseHandler(App::resolve(Database::class));

        return $databaseHandler->query("SELECT * FROM notes WHERE user_id = :user_id", [
            "user_id" => $currentId
        ])->get();
    }

    public function insertNote($body, $currentId)
    {
        $databaseHandler = new DatabaseHandler(App::resolve(Database::class));

        return $databaseHandler->query("INSERT INTO notes(body, user_id) VALUES (:body, :user_id)", [
            "body" => $body,
            "user_id" => $currentId
        ]);
    }

    public function displayNote($id)
    {
        $databaseHandler = new DatabaseHandler(App::resolve(Database::class));

        return $databaseHandler->query("SELECT * FROM notes WHERE id = :id", [
            "id" => $id
        ])->findOrFail();
    }

    public function getToEdit($id)
    {
        $databaseHandler = new DatabaseHandler(App::resolve(Database::class));

        return $databaseHandler->query("SELECT * FROM notes WHERE id = :id", [
            "id" => $id
        ])->findOrFail();
    }

    public function changeNotes($id, $body)
    {
        $databaseHandler = new DatabaseHandler(App::resolve(Database::class));

        return $databaseHandler->query("UPDATE notes SET body = :body WHERE id = :id", [
            "id" => $id,
            "body" => $body
        ]);
    }

    public function removeNote($id)
    {
        $databaseHandler = new DatabaseHandler(App::resolve(Database::class));

        return $databaseHandler->query("DELETE FROM notes WHERE id = :id", [
            "id" => $id
        ]);
    }

    //class that use this method: Account
    public function getUsers($id)
    {
        $databaseHandler = new DatabaseHandler(App::resolve(Database::class));

        return $databaseHandler->query("SELECT * FROM users WHERE id = :id", [
            "id" => $id
        ])->find();
    }

    public function updatePasswordUser($id, $password)
    {
        $databaseHandler = new DatabaseHandler(App::resolve(Database::class));

        return $databaseHandler->query("UPDATE users SET password = :password WHERE id = :id", [
            "id" => $id,
            "password" => password_hash($password, PASSWORD_BCRYPT)
        ]);
    }

    //class that use this method: Feedback
    public function insertFeedback($name, $email, $body, $currentId)
    {
        $databaseHandler = new DatabaseHandler(App::resolve(Database::class));

        return $databaseHandler->query("INSERT INTO feedback(name, email, body, user_id) VALUES (:name, :email, :body, :user_id)", [
            "name" => $name,
            "email" => $email,
            "body" => $body,
            "user_id" => $currentId
        ]);
    }
}