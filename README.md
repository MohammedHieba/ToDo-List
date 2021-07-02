# ToDo-List

ToDo-List is a simple To-Do Application built with Symfony, the Twig template engine and Bootstrap.

## Live Demo

[Live Demo](https://todo-list876.herokuapp.com/)



## Installation

Use the package manager [composer](https://getcomposer.org/).

```bash
composer install 
```

## Create DB structure

```add you
bin/console doctrine:database:create
bin/console doctrine:migrations:migrate
```

## .env

Please make sure to update this line.

```add you
DATABASE_URL=mysql://db_user:db_password@127.0.0.1:3306/db_name
```

## References
[Symfony](https://symfony.com/doc/current/index.html)
