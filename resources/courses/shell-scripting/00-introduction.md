# Introduction - le shell c'est quoi ?

*Shell se traduit "coquille" ou "carapace" en français, on peut le voir comme la couche supérieure qui entoure le "noyau" (kernel en anglais).*

Un shell est un programme qui permet d'intérragir avec le système d'exploitation via une interface en ligne de commande. On saisit des commandes avec notre clavier directement dans le shell ou via un terminal (un programme qui émule un shell) et le résultat des commandes est affiché sous forme de texte.

```bash
echo Hello World
```

> Hello World

## Différents types de shell

Historiquement le shell le plus utilisé était `sh` (le "Bourne shell") créé en 1979 par Stephen Bourne, il contient déjà la plupart des fonctionalités que l'on utilise aujourd'hui dans le shell. D'autres shells lui ont succédé (`csh`, `tsh`, `ksh`…) en appportant plus de fonctionalités (les alias, l'historique des commandes, les jobs…).

Sortit en 1989 `bash` ("**B**ourne **A**gain **SH**ell"), le successeur de `sh`, devient le shell par défaut des principales distributions Linux et pose les bases d'un standard du shell. **C'est le shell que nous utiliseront pendant ce module.**

Plus récement, d'autres shell comme `zsh` ou `fish` proposent des alternatives plus modernes à `bash` en facilitant la personalisation du shell et en proposant par exemple des mécanismes d'auto-complétion.

Pour savoir quel type de shell est actif, vous pouvez taper cette commande :

```bash
echo $0
```

> -bash

Pour changer de shell, il suffit de taper le nom du shell, par exemple `zsh`. Pour quitter le shell courrant et revenir au shell précedent on tapera `exit`.