# NoteSync 📝

NoteSync é um aplicativo de notas que permite aos usuários criar e gerenciar suas anotações de forma fácil e rápida.

## Visualização do Projeto
<img src=".github/preview.png">

## Funcionalidades 🚀

:white_check_mark: **Autenticação de Usuário:** Os usuários podem criar uma conta e fazer login para acessar suas notas.<br>
:white_check_mark: **Criação de Notas:** Com o login autenticado, os usuários podem criar, editar e excluir suas notas.<br>
:white_check_mark: **Envios de Feedback** É possivel enviar feedbacks sobre a plataforma<br>


## Como Usar 🛠️

### Pré-requisitos

- Certifique-se de ter o PHP instalado em seu ambiente.
- Configure um servidor web, como Apache, para executar o aplicativo.
- Certifique-se de ter o gerenciador de dependências instalado (Composer).

### Instalação

1. Clone este repositório: `git clone https://github.com/seu-usuario/note-sync.git`
2. Navegue até o diretório do projeto: `cd note-sync`
3. Rode o comando no terminal para instalar as dependências do projeto:
```
composer install
```
4. Inicie seu servidor web. 
5. Se você deseja usar o servidor PHP embutido para testar seu aplicativo, basta rodar o seguinte comando:

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
3. Após ter configurado o arquivo `config.php`, é necessario crias as tabelas no banco de dados.

4. Na raiz do `projeto`, tem um arquivo com nome de `myapp.sql`, contendo as tabelas que precisam ser criadas no banco de dados. Você pode baixar em sua máquina e executar as `instruções SQL` contidas nele.


## Notas Importantes 📜

- Este projeto ainda está em desenvolvimento.
- Sinta-se à vontade para relatar problemas ou sugerir melhorias.






