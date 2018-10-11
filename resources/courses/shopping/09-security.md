# Étape 9 - La sécurité

Vous mettrez en place la sécurité dans votre application Symfony :

* Restriction d'une url /admin à un "rôle administrateur".
* Ajout d'un formulaire de login.
* Ajouter le logout.
* Utilisation de notre entité User pour se connecter.
* Crypter les mot de passe.

Ressources :

* [Symfony Security](https://symfony.com/doc/current/security.html)
* [How to build a login form](https://symfony.com/doc/current/security/form_login_setup.html)
* [Logging out](https://symfony.com/doc/current/security.html#logging-out)
* [How to load security users from the database](https://symfony.com/doc/current/security/entity_provider.html)
* [Encoding the user's password](https://symfony.com/doc/current/security.html#c-encoding-the-user-s-password)

## Consignes

### L'interface d'admin

Vous créerez un controller `AdminController` sur l'url `/admin` qui sera la page d'accueil de votre administration. Toutes les pages commençant par `/admin` doivent être restreintes aux utilisateurs qui ont le role `ROLE_ADMIN`.

Vous pouvez tester le bon fonctionnement en activant l'authentification basic (`http_basic` dans `security.yml`), avec un provider `memory` (des utilisateurs en dur dans `security.yml`).

### Le formulaire de login

Vous rajouterez un formulaire de login en HTML pour vous connecter à l'application sans passer par `http_basic`.

* Créer un controller `LoginController` sur l'url `/url`.
* Modifier le code du controller et du template en suivant la documentation.
* Activer le formulaire de login dans `security.yml`.

### L'url /logout

Suivez la documentation pour permettre la déconnection avec l'url `/logout` (vous n'avez pas besoin de créer un controller).

### Les liens dans le menu

Vous utiliserez la fonction Twig `is_granted` pour afficher dans le menu de votre site :

* Le lien de connexion et d'inscription (seulement si on est déconnecté).
* Le lien de déconnexion (seulement si on est connecté).
* Le lien vers la page d'admin (seulement si on est connecté en tant qu'admin).

### L'utilisation de l'entity User

Vous suiverez la documentation pour utiliser votre entité User à la place du provider memory dans  `security.yml`. Il faudra rajouter une propriété `$roles` avec le type `simple_array` avec `make:entity` pour pouvoir savoir quels rôles ont les utilisateurs.

### Encoder le mot de passe

Vous utiliserez l'algorithme `bcrypt` pour encoder les mot de passe dans la base de donnée.

### BONUS : Les CRUD

Vous générerez des crud avec la commande `make:crud` pour avoir des interfaces d'administration dans `/admin` (ex `/admin/products`,  `/admin/users`).