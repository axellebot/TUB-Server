#Tub Symfony

Based on Symfony 3

##Installation made
###Dependence :
- Composer :
```shell
$ composer install
$ composer dump-autoload
```

- Bower :
```shell
$ bower install
```


###Entities :

- Generate DataBase from entities (ressources/entities.zip):

```shell
$ php bin/console doctrine:database:drop --force
$ php bin/console doctrine:database:create
$ php bin/console doctrine:schema:update --force
```

- Generate methods :

```shell
$ php bin/console doctrine:generate:entities AppBundle/Entity/
```


##Run Server

### Dev mode :
```shell
$ cd my_project_name/
$ php bin/console server:run
```


