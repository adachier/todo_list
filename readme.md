# Procédure d'installation

## Pré-requis
- serveur web local
- PHP 7.3

## Installation pour un utilisateur lambda

- Ouvrir un dossier en local
- faire un git clone du repository
```
composer update/install?
````
## Création de la base de données

````
bin/console doctrine:database:create
```

## Migration des entités

1. Création d'un fichier migration (code SQL) 

```
bin/console make:migration
```

2. Exécuter la migration 

````
bin/console doctrine:migration:migrate
````


## Fixtures

1. Les fixtures fonctionnent en mode développement

```
bin/console doctrine:fixtures:load
``` 

