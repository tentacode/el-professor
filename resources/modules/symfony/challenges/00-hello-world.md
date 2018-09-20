# Challenge "Hello Chaton"

Resources nécessaires (il suffit de suivre la documentation) :

* [Installing & Setting up the Symfony Framework](https://symfony.com/doc/current/setup.html)
* [Create your First Page in Symfony](https://symfony.com/doc/current/page_creation.html)

Vous devez créer un projet Symfony simple d'une seule page, qui affiche une photo de chaton (ou d'un autre animal mignon) :

1. Créer votre projet dans votre workspace avec composer dans le dossier `/Symfony/chaton`
2. Vous familiariser avec la commande `bin/console server:run` et `bin/console server:start` pour lancer le serveur web.
3. Créer un Controller `ChatonController` dans `src/Controller/ChatonController.php` qui affichera une page quand on va sur la page `http://127.0.0.1:1337/chaton`
4. La page affichera une image d'un animal mignon, le code HTML de la page sera dans `templates/chaton.html.twig`
5. Mettre en place git dans le projet et l'envoyer sur votre compte github.