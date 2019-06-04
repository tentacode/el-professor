# 3 - Héritage de tables

Le script `create_event_database` doit lancer plusieurs requêtes SQL pour créer une base de données `github_events` qui contient une table "parente" `events` et deux tables "filles" `watch_events` et `push_events`, vous utilisiserez l'héritage PostgreSQL.

La table `events` contient les champs en commun à tout les events, les tables filles contiennent des champs spécifiques provenant du payload (à vous de déterminer des champs intéressants pour des statistiques).

Les champs doivent être du bon type.

## Bonus :

* Modélisez d'autres types d'events.

Resources :

* [Github Events](https://developer.github.com/v3/activity/events/types/)
* [Héritage PostgreSQL](https://www.postgresql.org/docs/11/tutorial-inheritance.html)
* [Types de données](https://www.postgresql.org/docs/11/datatype.html)
* [sudo -u postgres psql -f](https://www.postgresql.org/docs/devel/app-psql.html) (cherchez aussi \connect).
