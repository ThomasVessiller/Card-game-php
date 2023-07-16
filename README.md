
# TCG_Builder

### Description
Ceci est un projet d'application pour creer des decks personalisés pour différents jeux de cartes.

Pour modele de carte j'ai pris une carte de jeu pokémon mais je l'ai simplifiée afin de pouvoir avoir une aplication plus simple a la premiere version.

## ❗ Attention


*Cette application n'est pas encore totalement fonctionnelle.*

## Auteur

- [@ThomasVessiller](https://github.com/ThomasVessiller)


## Installation

téléchargez l'application en executant la commande suivante :

```cmd
  git clone https://github.com/ThomasVessiller/Card-game-php.git
```
    
## Deployment

❗Docker engine est nécéssaire pour lancer le projet correctement❗
-> lancez docker desktop ensuite executez la commande suivante dans le dossier "Card-game-php" `docker compose up -d`

si vous n'avez pas la base de donnée il est nécéssaire de l'importer depuis le fichier "TCG_Buider.sql" trouvable en suivant le chemin suivant : `Card-game-php\html\database`
exportez le dans phpmyadmin en suivant [`http://localhost:8080`](http://localhost:8080)
## détails techniques
### fonctionalitées
- création de cartes ✔(seulement les cartes personnages 'mob')
- création de decks ✖
- connection sur l'application ✖
- page d'accueil avec vision d'ensemble sur les decks et leurs cartes respectives ✖
### ports
- 3036 connection Sql
- 8080 connection a phpMyAdmin pour la gestion de base de donnée Sql
- 80 pour l'application en [localhost](http://localhost)
### technologies
- Sql
- PHP 
- modele MVC
- html/CSS
