# TP - Bazar

### Objectif

Faire un script qui range un dossier.

Par exemple, en partant d'un dossier `bazar` qui contiendrait :

```bash
/bazar
    /Bureau
        image.jpg
        /secret
            photo.jpg
            video.mp4
            journal_intime.txt
    /Download
        chaton1.jpg
        chaton2.jpg
```

Le script `menage.sh` doit créer un dossier `bazar_clear` :

```bash
/bazar_clean
    /divers
        journal_intime.txt
    /images
        /2018
            /01
                chaton1.jpg
                chaton2.jpg
            /02
                photo.jpg
                image.jpg
            /03
            /04
            /05
            /06
            /07
            /08
            /09
            /10
            /11
            /12
    /videos
        video.mp4
```

Les images vont dans un dossier `/images`, un sous-dossier année qui correspond à l'année de création de l'image et un sous-dossier mois qui correspond au mois de création de l'image. Chaque dossier de mois est créé, même si il est vide.

Les vidéos vont dans un dossier `/videos`. Tout le reste va dans un dossier `/divers`.

### Commandes utiles

* mkdir
* cp
* find pour chercher des fichiers
* file pour avoir le type de fichier
* stat pour obtenir la date du fichier (avec l'option -t)
* touch pour changer la date d'un fichier (si vous avez besoin pour tester)
