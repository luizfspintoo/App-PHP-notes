# NoteSync 📝

NoteSync é um aplicativo de notas que permite aos usuários criar e gerenciar suas anotações de forma fácil e rápida.

## Visualização do Projeto
<img src=".github/preview.png">

## Funcionalidades 🚀

:white_check_mark: **Autenticação de Usuário:** Os usuários podem criar uma conta e fazer login para acessar suas notas.<br>
:white_check_mark: **Criação de Notas:** Com o login autenticado, os usuários podem criar, editar e excluir suas notas.<br>
:white_check_mark: **Interface Intuitiva:** Design simples e amigável para facilitar a experiência do usuário.<br>

## Como Usar 🛠️

### Pré-requisitos

- Certifique-se de ter o PHP instalado em seu ambiente.
- Configure um servidor web, como Apache, para executar o aplicativo.

### Instalação

1. Clone este repositório: `git clone https://github.com/seu-usuario/note-sync.git`
2. Navegue até o diretório do projeto: `cd note-sync`
3. Inicie seu servidor web. 
4. Se você deseja usar o servidor PHP embutido para testar seu aplicativo, basta rodar o seguinte comando:

```bash

php -S localhost:8888 -t public

```

### Configuração do banco de dados ⚙️

1. Configure um banco de dados MySQL.
2. No arquivo `config.php` na raiz do projeto, adicione as informações do seu banco de dados:

```php

<?php 

//exemplo

return [
    "host" => "localhost",
    "port" => 9999,
    "dbname" => "notesync",
    "charset" => "utf8mb4",
    "username" => "root", 
    "password" => "Teste123"
];

```
3. Após ter configurado o arquivo `config.php`, é necessario crias as tabelas no banco de dados, conforme está abaixo, em ordem:


 ```SQL
 
    CREATE TABLE `users` (
	`id` INT(10) NOT NULL AUTO_INCREMENT,
	`password` VARCHAR(100) NOT NULL,
	`email` VARCHAR(100) NOT NULL,
	PRIMARY KEY (`id`),
	UNIQUE INDEX `email` (`email`)
);


CREATE TABLE `notes` (
	`id` INT(10) NOT NULL AUTO_INCREMENT,
	`body` VARCHAR(255) NOT NULL,
	`user_id` INT(10) NOT NULL,
	PRIMARY KEY (`id`),
	FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
);


CREATE TABLE `feedback` (
	`id` INT(10) NOT NULL AUTO_INCREMENT,
	`body` VARCHAR(255) NOT NULL,
	`user_id` INT(10) NOT NULL,
	PRIMARY KEY (`id`),
	FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
);

 ```
 4. OBS: Lembrando que você deve criar as tabelas no banco de dados que foi colocado no arquivo `config.php`. Neste exemplo estou usando o nome do meu banco de dados como notesync.

4. Após certificar de que está tudo ok, basta testar a aplicação já conectado ao banco de dados.

## Notas Importantes 📜

- Este projeto ainda está em desenvolvimento.
- Sinta-se à vontade para relatar problemas ou sugerir melhorias.






