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
OR
```shell
$ php bin/console doctrine:generate:entities AppBundle:entity_name
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

##License

```
    Copyright 2016 Axel LE BOT

    Licensed under the Apache License, Version 2.0 (the "License");
    you may not use this file except in compliance with the License.
    You may obtain a copy of the License at

       http://www.apache.org/licenses/LICENSE-2.0

    Unless required by applicable law or agreed to in writing, software
    distributed under the License is distributed on an "AS IS" BASIS,
    WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
    See the License for the specific language governing permissions and
    limitations under the License.
```