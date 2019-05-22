# Les arguments de script

Pour récupérer les arguments d'un script, on dispose de la variable `$argv` qui contient un tableau dont le premier élément est le nom du script, et les autres éléments sont les arguments, aisni en appelant `php hello.php Gabriel Pillet` sur le script :

```php
<?php

print 'Script : '.$argv[0];
print "Nombre d'arguments".$argc; // $argc contient le nombre d'éléments
print 'Hello '.$argv[1].' '.$argv[2];
```

Affichera :

```bash
Script : hello.php
Nombre d'arguments : 2
Hello Gabriel Pillet
```