# Étape 8 - Les Formulaires

Vous créerez un formulaire d'inscription qui insérera un utilisateur en base de données.

## Ressources utiles

* [Symfony Forms](https://symfony.com/doc/current/forms.html)
* [Symfony Validation](https://symfony.com/doc/current/validation.html)
* [Bootstrap 4 Form Theme](https://symfony.com/doc/current/form/bootstrap4.html)

## Évaluation

Vous serez évalués sur vos compétences à :

* Créer un formulaire Symfony.
* Afficher correctement le formulaire dans votre site.
* Traiter le formulaire et ajouter l'utilisateur en base de données.
* Utiliser les bonnes contraintes de validation.

## Consignes

### Le formulaire d'inscription

Vous créerez un formulaire d'inscription pour l'entité `User` (voir [l'étape 3](http://elp.tentacode.net/course/shopping/03-modelisation) pour le détail de l'entité).

* Créer un controller `RegistrationController` qui affiche un titre "Inscription" si on va sur la page `/inscription`.
* Ajouter le formulaire d'inscription avec **les bons types de champs**.
* Quand le formulaire est soumis avec les bonnes informations, enregistrez l'utilisateur dans la base de données et redirigez vers une page de confirmation.
* La page de confirmation est une autre action de `RegistrationController` avec l'url `/inscription/confirmation` et contient uniquement un message de confirmation.

### La validation du formulaire

La validation **backend** du formulaire doit être faite correctement et respectée ces contraintes de validation :

* Aucun champ ne peut être vide.
* L'email doit correspondre à un email valide.
* Le mot de passe doit avoir au minimum 6 caractères.
* Le prénom **ne peut pas être Gabriel**.

### BONUS : Thème bootstrap 4

Appliquez le thème bootstrap 4 à votre formulaire.

### BONUS : Fichier de formulaire

Votre formulaire n'est pas configuré dans le RegistrationController mais dans un fichier `src/Form/RegistrationType.php`.
