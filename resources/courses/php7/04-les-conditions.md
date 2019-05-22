# Les conditions

## if, else, elseif

Le mot clé `if` permet d'exécuter du code si l'évaluation de la condition booléenne est à "vrai". Si la condition n'est pas un booléen, un transtypage implicite est effectué :

```php
$age = 12;
if (is_int($age)) {
    print "l'age est bien un entier";
}

if ($age) {
    print "le transtypage d'un entier, donne vrai";
}

// équivaut à
if ($age == true) {
    print "le transtypage d'un entier, donne vrai";
}
```

La clause `elseif` permet d'éxecuté du code si la condition précédente est évaluée à faux et que la condition du `elseif` est vraie. La clause `else` permet d'exécuter un code si toutes les conditions précédentes sont fauses.

```php
$nom = "Tartempion";
if (is_int($nom)) {
    print "Le nom est un entier";
} elseif ($nom === "Tartempion") {
    print "Le nom est Tartempion";
} else {
    print "Toutes les conditions précédentes sont fausses.";
}
```

## switch

Quand on teste une même variable sur plusieurs conditions, il peut être intéressant d'utiliser un `switch`.

Chaque `case` est comparé à la variable du switch de haut en bas. Au premier `case` qui est évaulué à `true` en comparant avec la variable du switch (avec une comparaison non stricte comme `==`), le bloc `case` est évalué, ainsi que tout les blocs `case` et `default` suivants, tant qu'on ne rencontre pas l'évaluation `break`. Si aucun `case` n'est vrai et qu'un bloc `default` est présent, il sera évalué. Par exemple :

```php
switch ($age) {
    case 10:
        print "10 ans";
    case 11:
    case 12:
        print "11, 12 ans";
        break;
    case 13:
        print "13 ans";
        break;
    default:
        print "autre";
}
```

Pour la valeur "10", le script affichera "10 ans" **et** "11, 12 ans" (pas de break, tout les cases suivant avant break sont évalués). Pour les valeurs 11 et 12 seul "11, 12 ans" sera affiché, pour la valeur 13 seul "13 ans" sera affiché et pour toute autre valeurs "autre" sera affiché.

## Opération ternaire

Pour simplifier le code suivant :

```php
if ($age >= 18) {
    $estMajeur = 'Oui';
} else {
    $estMajeur = 'Non';
}
```

On peut utiliser une opération ternaire sous la forme `condition ? valeur vraie : valeur fausse` :

```php
$estMajeur = ($age >= 18) ? 'Oui' : 'Non';
```