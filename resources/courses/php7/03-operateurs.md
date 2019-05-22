# Les opérateurs

## Opérateurs de comparaison

Ils retournent `true` ou `false` selon la condition :

### Supérieur / inférieur

```php
12 <= 14; // inférieur ou égal, retourne true
12 < 12;  // strictement inférieur, retourne false
'abc' >= 'def'; // supérieur ou égal, retourne false
'def' > 'abc';  // strictement supérieur, retourne true
```

### Comparaison "similaire"

On utilise `==` pour savoir si deux expressions sont "similaires", ce qui veut dire que la valeur, une fois transtypée est identique, la valeur est égale, mais le type peut être différent :

```php
12 == 12;   // retourne true
12 == 13;   // retourne false
12 == "12"; // retourne true
0 == true;  // retourne true
'abcd' == true; // retourne true
'' == false;    // retourne true
null == false;  // retourne true

// quand on compare deux objets, on vérifie qu'ils ont les même propriétés
new \DateTime('2017-09-30') == new \DateTime('2017-09-30'); // retourne true
```

### Comparaison stricte "identique"

On préfère utiliser `===` pour savoir si deux expression sont identique, elles ont la même valeur **et** sont du même type. Pour les objets ça doit être **la même instance** d'un objet pour être identique.

```php
12 === 12;   // retourne true
12 === 13;   // retourne false
12 === "12"; // retourne false
0 === true;  // retourne false
'abcd' === true; // retourne false
'' === false;    // retourne false
null == false;   // retourne false

new \DateTime() === new \DateTime(); // retourne false, instance différente
$a = new \DateTime('2017-09-30');
$b = $a;
$a === $b; // retourne true, même instance
```

## Opérateurs mathématiques

```php
2 + 3  === 5;  // addition
2 - 3  === -1; // soustraction
2 * 3  === 6;  // multiplication
8 / 2  === 4;  // division
2 ** 3 === 8;  // exposant
7 % 3  === 1;  // modulo, reste de la division de 7 par 3
```

On peut combiner un opérateur mathématique avec une affectation :

```php
// le code
$a = 12;
$a = $a + 13; // 25

// est équivaut à
$a = 12;
$a += 13; // 25
```

On peut incrémenter ou décrémenter des variables :

```php
$x = 1;
$x++; // 2

$y = 10;
$y--; // 9
```

## Spaceship opérateur

Nouveauté de PHP 7, le "spaceship" `<=>` retourne -1 si la valeur de gauche est inférieur à celle de droite, 0 si les deux valeurs sont égales et +1 si la valeur de gauche est  supérieur à celle de droite. Il est utilisé principalement pour simplifier les fonctions de comparaison qui attendaient exactement ce comportement :

```php
// avant PHP7, pour trier un tableau par date
usort($dates, function(\DateTime $a, \DateTime $b) {
    if ($a < $b) {
        return -1;
    } elseif ($a > $b) {
        return 1;
    }

    return 0;
});

// depuis PHP7
usort($dates, function(\DateTime $a, \DateTime $b) {
    return $a <=> $b;
});
```
