# Introduction

PHP 7.2 est la dernière version stable du langage de programmation principalement dédié au scripting et à la programmation de site web.

## Fichier PHP

Un fichier PHP se termine généralement par l'extension `.php`. Le code PHP doit être écris dans une balise `<?php ?>` pour être interprété. Voici un exemple d'un script `hello.php` :

```php
<?php

// ce code affichera "Hello World!"
echo "Hello World!";

// la balise fermante ci-dessous est faccultative
// et est généralement omise du script
?>
```

Pour exécuter ce script dans un terminal, il suffit de taper `php hello.php`.

Chaque instruction PHP doit se terminer par un `;` sous peine de faire planter le script, ainsi le code ci-dessous n'est pas valide :

```php
<?php

echo "Non."

```

## Les commentaires

Les commentaires permettent d'expliquer le code et ne sont pas interprêtés :

```php
// on peut écrire un commentaire sur une ligne

/**
 * ou sur plusieurs
 * lignes
 */
```
