# Anatomie d'un fichier PHP

## Fichier PHP

Un fichier PHP se termine généralement par l'extension `.php`. Le code PHP doit être écris dans une balise `<?php ?>` pour être interprété. Voici un exemple d'un script `hello.php` :

```php
<?php

// ce code affichera "Hello World!"
echo "Hello World!";

// la balise fermante ci-dessous est faccultative
// et est généralement omise du script (c'est une bonne pratique)
?>
```

Pour exécuter ce script dans un terminal, il suffit de taper `php hello.php`.

Chaque instruction PHP doit se terminer par un `;` sous peine de faire planter le script, ainsi le code ci-dessous n'est pas valide :

```php
<?php

echo "Non."
echo "Ça ne marchera pas !"

```

## Plusieurs balises PHP

Un même fichier PHP peut contenir plusieurs balises PHP, le texte qui est écris hors des balises PHP s'affichera comme si on utilisait la méthode `echo`.

```php
<?php echo "Hello "; ?>
Il y a plusieurs
<?php echo "Balises"; ?>
```

Affichera :

```bash
Hello
Il y a plusieurs
Balises
```

## Les commentaires

Les commentaires permettent d'expliquer le code et ne sont pas interprêtés :

```php
// on peut écrire un commentaire sur une ligne

/*
 ou sur plusieurs
 lignes
 */

/**
 * La syntaxe PHPDoc est une manière d'écrire des commentaires qui sont interpretés 
 * par des outils ou IDE pour documenter le code
 * plus d'infos : https://docs.phpdoc.org/
 * 
 * @var int $age L'age du capitaine
 */
$age = 42;
```
