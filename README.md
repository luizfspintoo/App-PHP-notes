# NoteSync 📝

NoteSync é um aplicativo de notas que permite aos usuários criar e gerenciar suas anotações de forma fácil e rápida.

## Visualização do Projeto

<img src=".github/preview.png">

## Funcionalidades 🚀

:white_check_mark: **Autenticação de Usuário:** Os usuários podem criar uma conta e fazer login para acessar suas notas.<br>
:white_check_mark: **Criação de Notas:** Com o login autenticado, os usuários podem criar, editar e excluir suas notas.<br>
:white_check_mark: **Envios de Feedback:** É possivel enviar feedbacks sobre a plataforma<br>

## Como Usar 🛠️

### Pré-requisitos

- Certifique-se de ter o PHP instalado em seu ambiente. <a href="https://www.php.net/downloads.php" target="_blank">Site oficial PHP</a>
- Configure um servidor web, como Apache, para executar o aplicativo.
- Certifique-se de ter o gerenciador de dependências instalado (Composer). <a href="https://getcomposer.org/download/" target="_blank">Site oficial Composer</a>

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
2. Copie o arquivo `.env.example` para `.env` e configure as credenciais do banco de dados.
3. Crie as tabelas copiando e executando as instruções SQL contidas no arquivo [`myapp.sql`](https://github.com/luizfspintoo/note-sync/blob/main/myapp.sql)

### Testes 🧪

#### Rodando os testes

Rode o comando no terminal para executar os testes:

```
composer test
```

#### Rodando os testes com cobertura

1. Rode o comando no terminal para executar os testes com cobertura:

```
composer test-coverage
```

2. Abra o arquivo `coverage/index.html` no seu navegador para visualizar a cobertura dos testes.

## Notas Importantes 📜

- Este projeto ainda está em desenvolvimento.
- Sinta-se à vontade para relatar problemas ou sugerir melhorias.
