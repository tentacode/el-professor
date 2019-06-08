# Annexe - Configuration du serveur

À l'installation PostgreSQL n'est accessible qu'en local en utilisant l'utilisateur système `postgres` qui a été créé à l'installation. Cet utilisateur n'a pas de mot de passe on ne peut donc pas l'utiliser pour se connecter à distance, nous allons devoir modifier la configuration de PostgreSQL pour permettre un accès distant.

## L'arborescence du serveur

Où sont stockés les différents fichiers de postgres ?

* `/etc/postgresql/11/main` : contient les fichiers de configuration
* `/var/lib/postgresql/11/main` : contient les fichiers de votre base de données
* `/var/log/postgresql/` : les logs de PostgreSQL, idéal pour débugger une erreur

## Le fichier postgresql.conf

Ce fichier contient toute la configuration liée au **fonctionnement** de PostgreSQL, il définit par exemple :

* où sont stockés les fichiers de données
* comment est assignée la mémoire de la machine à PostgreSQL
* les ports d'écoute du serveur
* comment sont gérés les logs
* la configuration des information de timezone

### Options intéressantes

* `listen_addresses` : addresses d'écoute, par défaut limité à localhost, mettre '\*' pour que le serveur soit accessible depuis n'importe quelle IP.
* `port` : le port d'écoute
* `max_connections`
* `shared_buffers` : mémoire disponible pour postgresql (25% de la ram recommandée si serveur dédié).
* `effective_cache_size` : mémoire cache (50% recommandée sur un dédié)
* `work_mem` : maximum de RAM par opération (tri, jointure, etc.), dépend de la nature de l'application, [plus d'infos](https://www.depesz.com/2011/07/03/understanding-postgresql-conf-work_mem/)
* `max_parrallel_workers_per_gather` : coupé par défaut, utile si on a plusieurs CPU à dispo.

### Modifier la configuration de postgres.conf

La bonne pratique est de ne **jamais** modifier directement le fichier `postgres.conf` et de le garder comme référence, mais de modifier la configuration en SQL directement :

```sql
ALTER SYSTEM SET port = 1234;
```

Cette commande créera un fichier `postgresql.auto.conf` directement dans le dossier data de postgresql (`/var/lib/postgresql/11/main`) qui contiendra toutes nos options de configuration et écrasera celles présentes dans `postgresql.conf`.

La plupart des changements d'option nécessitent un `reload` ou un  `restart` de PostgreSQL.

Un `reload` ne coupe pas les connections active et prends en compte les modifications de la configuration :

```bash
sudo service postgresql reload
```

Ou directement en SQL :

```sql
SELECT pg_reload_conf();
```

`restart` relance complètement le serveur, avec le risque de couper les connections actives :

```bash
sudo service postgresql restart
```

## Le fichier pg_hba.conf

Il définit la configuration des **accès** au serveur.

Voici le contenu par défaut du fichier :

```conf
# DO NOT DISABLE!
# If you change this first entry you will need to make sure that the
# database superuser can access the database using some other method.
# Noninteractive access to all databases is required during automatic
# maintenance (custom daily cronjobs, replication, and similar tasks).
#
# Database administrative login by Unix domain socket
local   all             postgres                                peer

# TYPE  DATABASE        USER            ADDRESS                 METHOD

# "local" is for Unix domain socket connections only
local   all             all                                     peer
# IPv4 local connections:
host    all             all             127.0.0.1/32            md5
# IPv6 local connections:
host    all             all             ::1/128                 md5
# Allow replication connections from localhost, by a user with the
# replication privilege.
local   replication     all                                     peer
host    replication     all             127.0.0.1/32            md5
host    replication     all             ::1/128                 md5
```

* Le premier argument est "local" pour les connexions directes par socket unix, "host" pour les connexions par IP.
* Le second est la base de donnée ou "all" pour toutes les bases.
* Le troisième est l'utilisateur ou "all" pour tout les utilisateurs.
* Le quatrième est l'adresse IP (ne s'applique pas pour les connections "local").
* Le dernier est le mode d'authentification.

Les modifications ne seront prisent en compte qu'après un **restart** de PostgreSQL.

### Les modes d'authentification

Les plus courants sont :

* trust : accessible sans password (pas sécurisé, à utiliser uniquement sur les connexions locales, et encore on préferera l'éviter complétement)
* reject : empêche la connection.
* peer : se connecte avec le même utilisateur que l'utilisateur système connecté, sans besoin de mot de passe.
* md5 : connexion avec un couple utilisateur / mot de passe hashé.
* password : mot de passe en clair.
* ident : permet de lier un utilisateur système à un utilisateur postgresql via le fichier pg_indent.conf
* cert : via un certificat SSL.

Pour plus d'infos, voir [la documentation des modes d'authentification](https://www.postgresql.org/docs/10/static/auth-methods.html).

### La priorité des règles

Dès qu'une règle correspond au couple type + database + user + adresse, elle est évaluée, si la connection est autorisée l'utilisateur sera connecté, sinon on évalue aucune autre règle. Les règles sont lues de haut en bas. Il faut faire très attention à l'ordre des règles.