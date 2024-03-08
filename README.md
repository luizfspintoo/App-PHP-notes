# NoteSync 📝

NoteSync é um aplicativo de notas que permite aos usuários criar e gerenciar suas anotações de forma fácil e rápida.

## Visualização do Projeto


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

### Configuração ⚙️

1. Configure um banco de dados MySQL.
2. No arquivo `config.php` na raiz do projeto, adicione as informações do seu banco de dados:

```php

<?php 

//exemplo

return [
    "host" => "localhost",
    "port" => 9999,
    "dbname" => "notesync",
    "charset" => "utf8mb4"
];


```

## Notas Importantes 📜

- Este projeto ainda está em desenvolvimento.
- Sinta-se à vontade para relatar problemas ou sugerir melhorias.


## Próximos Passos
- [ ] Funcionalidade de edição da conta do usuário.
- [ ] Aprimoramento da página de Dashboard, com designer moderno e intuitivo.
- [ ] Desenvolvimento de uma nova página Home, com mais detalhes sobre a aplicação.
- [ ] Desenvolvimento da página de Login e Registro com novo designer.





