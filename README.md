Documentation installation 
installer le projet :
 en ligne de commande taper “git clone https://github.com/durdylo/testKaliticsV2.git”
installer les dépendances du projet, en ligne de commande dans le dossier du projet “composer install”

dans le fichier .env modifier la ligne 32 par votre nom d’utilisateur mysql et son mot de passe associé. 
créer une bdd testKalitics (si vous voulez choisir un autre nom de bdd, n’oubliez de le modifier ligne 32 du fichier .env)
exécuter les fichiers de migration “php bin/console doctrine:migration:migrate”
exécuter les fixtures pour avoir des données sans votre bdd “ php bin/console doctrine:fixtures:load” (Attention le contenu de la bdd sera effacé)
lancer le server en local “php bin/console server:run”
cliquer sur Se connecter pour vous connecter avec un des utilisateur en bdd et accéder aux différents modules . 



super Administrateur
user1@mail.fr
Password1.

direction
user2@mail.fr
Password2.

Ressources humaines
user3@mail.fr
Password3.

Manager d’équipes
user4@mail.fr
Password4.

Opérateur
user5@mail.fr
Password5.



