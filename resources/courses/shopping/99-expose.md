# Exposé

En équipe de 3 vous ferez un exposé sur un sujet avancé Symfony. Vous ferez une soutenance de 10 minutes **sans slides** avec une démo de la fonctionnalité exposée.

Cet exposé comptera pour 5 points de la note théorique du module.

## Évaluation

Vous serez évalués selon la grille suivante :

* L'intéret d'utiliser la solution a été correctement exposé de manière compréhensible pour les autres élèves. (1 point)
* Le groupe explique comment intégrer la solution dans un projet Symfony. (1 point)
* Le groupe fait une démo de la solution soit dans le projet Shopping, soit dans un nouveau projet créé pour l'occasion. (1 point)
* Le groupe répond correctement aux questions posées. (1 point)
* Tout les membres du groupes parlent / montrent qu'ils ont compris le sujet  (1 point).

## Sujets

### L'envoi d'email avec Swiftmailer

Swiftmailer permet d'envoyer des e-mails depuis Symfony.

* Comment envoyer un email dans Symfony ?
* Comment faire un "faux" envoi d'email quand on a pas de serveur mail disponible (en environement de test) ?
* Comment vérifier qu'un mail a été envoyé dans le profiler ?

### Générer des fixtures avec Alice et Faker

Alice et Faker permet de générer des fixtures aléatoires en masse dans un projet Symfony.

Resource utile : [https://github.com/nelmio/alice](https://github.com/nelmio/alice)

* Quel est l'intéret d'utiliser Alice et Faker pour générer des fixtures dans le projet ?
* Montrer un exemple dans le projet Shopping.

### Le composant Process de Symfony

Le composant process de Symfony permet d'exécuter des commandes systèmes (linux) depuis PHP.

* Montrer comment utiliser le composant Process.
* Expliquer les possibilités avancées du composant.

### Les thèmes de formulaires

Vous montrerez comment créer votre propre thème de formulaire Symfony.

* Créer votre propre thème de formulaire.
* Expliquer le fonctionnement d'écrasement des blocks de formulaire en partant d'un thème existant.
* Montrer qu'on peut définir un thème de formulaire globalement dans tout le projet Symfony.

### Le composant Workflow de Symfony

Le composant Workflow permet de mettre en place des process métier (par exemple le processus de publication d'un article de presse) ou des machine à état.

Resource utile : [Conférence sur le composant Workflow](https://www.youtube.com/watch?v=9-jQf7CL7X4)

* Expliquer l'intéret et la mise en place du composant Workflow
* Utiliser un exemple SIMPLE dans un nouveau projet. (vous pouvez vous inspirer de la conférence ci-dessus).

### Le composant Messenger de Symfony

Le composant Messenger de Symfony permet d'ajouter de la programmation évenementielle dans Symfony (listeners).

* Montrer un exemple d'événement appliquable au projet Shopping.
* Faire la démo d'un événement (exemple : envoi d'un email à l'inscription de l'utilisateur, l'email n'a pas besoin d'être réelement envoyé).

### Le composant Cache de Symfony

Le composant Cache permet de mettre en cache des traitement couteux de votre site Symfony.

* Montrer un exemple concret de cache utilisable dans le projet Shopping (ou un autre projet) pour un traitement intensif. (Ex : grosse requête à la base de données).

### L'internationalisation dans Symfony

Vous montrerez comment traduire un projet Symfony (par exemple le projet Shopping, ou un autre projet créé pour l'occasion).

### Les extensions Twig

Vous montrerez comment créer votre projet extension Twig qui ajoute des fonctions, filtres, etc. personalisée dans votre projet Shopping.

### Le composant BrowserKit

Dans un nouveau projet Symfony, vous créerez un petit "Crawler" qui va récupérer des informations d'un site web existant (ex : se connecter à un site via un formulaire, et récupérer des informations d'un page connectée).