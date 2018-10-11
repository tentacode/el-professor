# Cahier des charges

Twitter mais…

* avec des chatons
* pour les professionels de l'immobilier
* pour les étudiants d'YNOV
* etc.

Vous allez réaliser en équipe une variante du célèbre réseau social, vous n'irez bien sûr pas aussi loin que Twitter, mais vous serez cappable de créer un compte, poster des messages, ajouter des amis, avoir une interface d'adminitration pour la modération etc.

## Évaluation

Vous serez évalués sur les critères suivants :

* Votre capacité à utiliser correctement **toutes** vos connaissances sur Symfony apprises pendant le module.
* Votre bon sens pour créer des pages "**user-friendly**" en terme d'interface, qui correspondent au standard des sites internet modernes (en vous inspirant des sites existants).
* Votre **esprit d'initiative** pour proposer un projet original avec des fonctionalités avancées.
* L'efficacité de votre **travail en équipe**.
* La propreté de votre code.
* Votre capacité à suivre les consignes à la lettre.
* Le fonctionnement de votre projet en démo sera évalué par tout les étudiants de la classe.

**Vous ne serez pas évalués sur votre capacité à faire du CSS / HTML / JavaScript, tout le monde doit uniquement se focaliser sur la partie Symfony du projet.**

## Consignes

### Livraison du projet

Le projet **doit** être livré sur un dépot github, en passant par `tentacode-classroom`, avec le lien d'invitation suivant : [https://classroom.github.com/g/Gw7TrfSI](https://classroom.github.com/g/Gw7TrfSI) (un seul dépot par équipe). Exemple de votre nom d'équipe "avec des chatons" créera le dépot `tentacode-classroom/twitter-mais-avec-des-chatons`.

### Gestion de projet

Vous **devez** utiliser un [Trello](https://trello.com/) pour votre gestion de projet. Vous **devez** renseigner toutes les étapes au fur et à mesure en Todo / Doing / Done (c'est à dire au moment où vous commencez / terminez une tâche, pas une fois par jour, encore moins une fois par semaine). Chaque tâche devra être assignée à une personne de l'équipe. Vous pouvez créer un Trello privé, mais vous **devez** m'y inviter.

Pour vous faciliter la vie, vous pouvez utiliser git avec des branches "feature". Pour chaque fonctionnalité, la personne concernée créé une branche (par exemple "feature-inscription") et push cette branche. Personne ne travaille sur la branche master. À la fin du dev sur la feature, on fait une "pull request" et la branche est mergée dans master.

### Fonctionalités minimum

Votre site devra au minimum contenir les fonctionalités suivantes :

* Une page d'accueil
* La possibilité de s'inscrire / se login / se logout.
* Une page par utilisateur qui montrera les "messages" de l'utilisateur (comme la timeline twitter).
* La possibilité pour un utilisateur d'ajouter un message.
* Un formulaire de recherche pour rechercher des utilisateurs.
* Pouvoir rajouter un utilisateur en "ami" (les follower sur twitter).
* Une page qui affichera tout les messages de nos "amis" (la page principale de twitter qui correspond à notre feed).
* La possibilité par un utilisateur "modérateur" de pouvoir supprimer des messages ou de bannir des utilisateurs.
* Une interface d'admin accessible par un utilisateur "admin" qui permettra de gérer les modérateurs.

## Fonctionalités spécifiques

Vous **devrez** ajouter également des fonctionalités spécifiques à votre projet, qui peuvent être dictées par votre thème ou qui sont des ajouts pour améliorer l'utilisation de votre site, par exemple (mais non limité à) :

* La restriction à utiliser votre site uniquement pour des utilisateurs inscrits (à la façon d'un intranet).
* L'utilisation de médias à la place de textes pour vos messages (images, sons, vidéos, etc.).
* La restriction sur les messages à des critères spécifiques (par exemple sur twitter les messages sont limités à 280 caractères).
* Des pages supplémentaires (profil des utilisateurs).
* L'utilisation d'une messagerie privée.
* Des envois d'e-mails pour notifier les utilisateurs.
* La possibilité de "RT" le message d'un ami pour qu'il apparaitre sur votre page messages.
* La possibilité de "liker" le message de quelqu'un d'autre.
* Utilisation d'AJAX et d'une API Json.

**Faites nous rêver, trouvez des fonctionalités innovantes (mais qui restent facile à implémenter)**

## Design de votre site

**Vous ne serez pas évalués sur votre capacité à faire du CSS / HTML / JavaScript, tout le monde doit uniquement se focaliser sur la partie Symfony du projet.**

Vous avez **l'obligation** d'utiliser [Bootstrap 4](https://getbootstrap.com/). Vous pouvez utiliser d'autres librairies frontend en supplément (font-awesome par exemple).

## Propreté du code

Vous **devez** respecté les conventions de nommages PHP :

* PSR-1 : [https://www.php-fig.org/psr/psr-1/](https://www.php-fig.org/psr/psr-1/)
* PSR-2 : [https://www.php-fig.org/psr/psr-2/](https://www.php-fig.org/psr/psr-2/)
* Twig : [https://twig.symfony.com/doc/2.x/coding_standards.html](https://twig.symfony.com/doc/2.x/coding_standards.html)
* HTML5 : [https://www.w3schools.com/html/html5_syntax.asp](https://www.w3schools.com/html/html5_syntax.asp)
* Bien indenter votre code, avec 4 espaces (et aucunes tabulations).

Vous pouvez installer [pretty](https://github.com/mnapoli/pretty) sur votre projet pour vous faciliter la vie (cet outil vous dira où sont les problèmes de coding standard dans votre code PHP).

## Installation de votre projet

Vous **devez* fournir les informations d'installation de votre projet dans le fichier `README.md` au [format markdown](https://guides.github.com/features/mastering-markdown/).

Vous **devez** fournir une commande `app:install` qui exécutera toutes les étapes d'installation du projet. N'importe qui doit pouvoir cloner le projet git, lancer `app:install` et se retrouver avec un projet qui marche :

* Les dépendances sont installées (composer et npm).
* Le fichier .env est créé avec les bonnes infos (on demandera les infos dans la commande Symfony).
* La base de données est créée et contient des données de test (fixtures).
* Le serveur symfony est lancé.

## Tests fonctionnels

Vous **devrez** ajouter des tests fonctionnels (idéalement au moins un par page) qui valideront le fonctionnement de votre application. Les tests **doivent** être verts quand vous livrerez votre projet. Vous **pouvez** utiliser `travis-ci` pour automatiser les tests sur votre dépot git.