# Meu Teste

[README in english](README.md)

CRUD criado conforme solicitado no teste.

* Sistema de cadastro
* Login
* Administração de usuários
* Upload de avatar
* Tradução de linguas inglês e português brasileiro

## Começando

Para utilizar o projeto você precisa fazer o download ou cloná-lo (via SSH ou HTTPS), e colocar o mesmo em um servidor que permita o uso da linguagem PHP ([XAMPP](https://www.apachefriends.org/pt_br/index.html), [WAMP](https://bitnami.com/stack/wamp), [LAMP](https://bitnami.com/stack/lamp), [Laravel Homestead](https://laravel.com/docs/7.x/homestead), [Laradock](https://laradock.io/), etc.).

```sh
$ git clone git@github.com:tanukesensei/prodigious-test.git # SSH
$ git clone https://github.com/tanukesensei/prodigious-test.git # HTTPS
```

Para executar o projeto, será necessário instalar o [Composer](https://getcomposer.org/download/) e o [MySQL](https://dev.mysql.com/). Todos os ambientes mencionados acima já possuem o MySQL porém, apenas o Laravel Homestead e o Laradock possuem o Composer.

Após as instalações, crie o banco de dados com o nome que preferir. Depois de criar o banco de dados acesse a pasta do projeto, você verá um arquivo chamado `.env.example`, ele fica na pasta raiz do projeto.
Você deve copiá-lo para um arquivo chamado `.env` apenas, isto feito, você precisa abrir o terminal, acessar a pasta do projeto e utilizar o comando a seguir para gerar a chave da aplicação.

```php
$ php artisan key:generate
```
Depois de inserir o comando, abra o arquivo `.env` e verifique se o campo `APP_KEY` possui uma chave gerada, caso não tenha, execute novamente o comando anterior.

Ainda no `.env` procure pelo bloco de código abaixo:

```ini
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=
DB_USERNAME=
DB_PASSWORD=
```

Por padrão o Laravel vem configurado para utilizar o MySQL, informe nos campos `DB_DATABASE`, `DB_USERNAME` e `DB_PASSWORD`, o nome do banco de dados, o usuário do banco de dados e a senha do usuário, respectivamente. Salve e feche o arquivo.

Após isto, no seu terminal no local do projeto execute os comandos:

```php
$ php artisan migrate
``` 

Depois:

```php
$ php artisan db:seed
``` 

O primeiro comando irá criar as tabelas no banco de dados, enquanto o segundo irá popular as mesmas. Posteriormente, execute:

```php
$ php artisan serve
``` 

Isto irá iniciar o servidor do projeto e mostrar a URL. 

Após todos os passos feitos, o projeto poderá ser acessádo. Por se tratar de um teste, as credenciais do Administrador são login `admin@admin.com` e senha `123456789`.

## Ferramentas Utilizadas

* [Laravel](https://laravel.com/) 7.24
* [PHP](https://www.php.net/) 7.2
* [MySQL](https://dev.mysql.com/) 14.14
* [Bootstrap](https://getbootstrap.com/) 4.3 

## Agradecimentos

Agradeço a [Lucas](https://github.com/lucascudo/laravel-pt-BR-localization) pela tradução dos campos de erro disponibilizada em seu repositório do GitHub.

## Licença

O Meu Teste é um projeto de software livre na licença do [MIT](LICENSE).
