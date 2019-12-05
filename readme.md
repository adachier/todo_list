# Application Symfony Todolist
## Install Symfony version '4.x.x'
# Mémo cmd line
__Terminal__ : ```composer create-project symfony/website-skeleton my_project_name```
## Procédure d'installation
### Clone Github procédure
### Database
__Config database dans .env__:  
```DATABASE_URL=mysql://root:root@127.0.0.1:8889/my_to_do_list```  
__Création physique d'une base de donnée__  
```bin/console doctrine:database:create```
### Entités
__Les types de données de l'application__:  
On a deux entités qui apparaissent : _Category_ et _Todo_
1. Category(id, name)
2. Todo(id, title, content, createdAt, updatedAt, todoFor)

__Terminal__ :  

Pour créer les deux entités : ```php bin/console make:entity```  
Commencer par Category puis Todo.  
La relation se fera à partir de l'entité Todo, avec une propriété _category_id_ qui sera du type __relation__.
### Migrations
1. ```bin/console make:migration``` Création du fichier de migration (code SQL)  
2. Exécuter la migration ```bin/console doctrine:migration:migrate```-> création des tables Todo et Categroy dans my SQL

