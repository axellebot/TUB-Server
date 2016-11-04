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

### Prod mod :
- Run first :
```shell
$ export SYMFONY_ENV=prod
```
- Follow Official Instruction [here](http://symfony.com/doc/current/deployment.html)

##Example
Deployed on :

* [tub.lebot.xyz](tub.lebot.xyz)


