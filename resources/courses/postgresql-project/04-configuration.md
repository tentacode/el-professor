# 4 - Modification de la configuration

Le script `update_configuration` doit lancer plusieurs requêtes SQL pour changer la configuration avec la commande SQL `ALTER SYSTEM`.

Vous devez changer le port pour "1234" et configurer la mémoire pour un traitement efficace des données (voir ressource dans la documentation).

Le script doit reloader la configuration pour qu'elle soit effective.

À la fin du script vous afficherez les valeurs modifiées avec `SELECT FROM pg_settings` (seulement les valeurs des options modifiées).

## Bonus :

* Trouver des options de configuration qui peuvent être utiles à modifier.

Resources :

* [ALTER SYSTEM](https://www.postgresql.org/docs/11/sql-altersystem.html)
* [Table pg_settings](https://www.postgresql.org/docs/11/view-pg-settings.html)
* [Comment modifier la mémoire](https://www.depesz.com/2011/07/03/understanding-postgresql-conf-work_mem/)
