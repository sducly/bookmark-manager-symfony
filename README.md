
# Bookmark Manager

> Bookmark manager est un outil de gestion des liens. Il offre la possibilité de stocker et catégoriser des liens Flickr et Viméo. 

Bookmark manager est basé sur les technologies suivantes: 
- Symfony 3.4 
- ReactJs
- Typescript

### Prérequis
- PHP > 7.0
- Composer
- Git
- Nodejs
- Yarn
- Make

### Installation
Utiliser les commandes suivants afin d'installer votre projet sur votre poste local :
```
git clone https://github.com/sducly/bookmark-manager-symfony.git
cd bookmark-manager-symfony
make install
```
### Démarrer le server (production)
La commande suivante permet de démarrer le projet en mode production. 
```
make server-prod-start
```
Ouvrez un navigateur et allez à l'adresse suivante : http://localhost:8000/

### Démarrer le server (développement)
La commande suivante permet de démarrer le projet en mode dev. En plus d'un PHP built in server, la commande démarre un webpack dev server en mode hot reload. 
```
make server-dev-start
```
Ouvrez un navigateur et allez à l'adresse suivante : http://localhost:8000/
