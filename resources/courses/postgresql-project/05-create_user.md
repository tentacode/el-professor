# 5 - Création des utilisateurs

## 5.1 - Création d'un utilisateur super admin

Le script `create_users` doit créer plusieurs utilisateurs, dont un utilisateur super admin.

Le nom de l'utilisateur est `super_admin` et son mot de passe est `12345`. Vous devez créer l'utilisateur avec `CREATE ROLE` avec l'utilisateur `postgres` (et aussi une base de données `super_admin` dont il est OWNER) et modifier le fichier `pg_hba.conf` pour pouvoir vous connecter avec mot de passe en tapant : `psql --username=super_admin --password`.

Vous devez créer un fichier `.pgpass` dans votre home directory `~/.pgpass` avec le bon chmod (0600) pour pouvoir vous connecter sans mot de passe : `psql --username=super_admin`.

À la fin du script vous vérifierez que la connection est possible en utilisant `psql --username super_admin -c "SELECT 'Je suis connecté en super admin.';"`.

Copiez les fichiers `pg_hba.conf` et `~/.pgpass` dans un dossier `/etc` de votre dépot github.

## 5.2 Créer l'utilisateur github

Dans le même script, mais en utilisant votre nouvel utilisateur `super_admin` (qui a le droit de créer un user), créez un utilisateur qui a le même nom que votre base de données github (par exemple `github_events` si c'est le nom de votre BDD). Modifier la base de données `github_events` pour que le nouvelle utilisateur en soit le propriétaire (OWNER).

Mettez à jour le fichier `~/.pgpass` pour se connnecter sans mot de passe avec le nouvel utilisateur.

À la fin du script vous vérifierez que la connection est possible en utilisant `psql --username github_events -c "SELECT 'Je suis connecté sur github.';"`.

Resources :

* [CREATE ROLE](https://www.postgresql.org/docs/11/sql-createrole.html)
* [ALTER DATABASE](https://www.postgresql.org/docs/11/sql-alterdatabase.html)
