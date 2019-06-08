# Annexe - Connexion en local

À l'installation PostgreSQL n'est accessible qu'en local en utilisant l'utilisateur système `postgres` qui a été créé à l'installation. Cet utilisateur n'a pas de mot de passe donc on ne peut pas s'y connecter par des moyens convientionnels.

## Connexion avec l'utilisateur postgres

L'utilisateur créé à l'installation est superadmin, il est judicieux de le conserver au cas où, mais de se créer un compte admin plus classique avec un mot de passe, pour se connecter en ligne de commande on utilisera [la commande psql](/doc/psql), on peut y accéder sans mot de passe, à conditions d'utiliser **l'utilistateur système postgres**, sous debian :

```bash
sudo -u postgres psql
```

On en profitera pour créer un utilisateur admin :

```sql
CREATE ROLE admin LOGIN PASSWORD 'adminpassword' SUPERUSER;
\q
```

On ne peut cependant toujours pas se connecter à l'utilisateur `admin` via psql :

```bash
psql --username=admin --password
```

Affichera le message `psql: FATAL:  Peer authentication failed for user "admin"`.

## Modifier le fichier pg_hba.conf

Il faudra modifier le fichier `/etc/postgresql/main/11/pg_hba.conf` pour autoriser la connection par mot de passe sur le compte admin, au bon endroit pour éviter qu'une autre règle s'applique :

```
local all admin md5
```

## Le fichier .pgpass

Pour éviter de devoir saisir le password en utilisant `psql`, on peut stocker un fichier `.pgpass` dans le dossier home de l'utilisateur courant (`~/.pgpass`), avec les droits d'accès 0600, il est de la forme :

```
hostname:port:database:username:password
```

Donc on pourra par exemple écrire :

```
127.0.0.1:5432:nombase:monuser:monpassword
```

On peut également utiliser `*` comme wildcard :

```
*:*:*:monuser:monpassword
```

Désormais on a plus besoin de taper le mot de passe pour se connecter avec `monuser` : `psql --username=monuser`. Ceci ne fonctionnera que pour l'utilisateur courant.

