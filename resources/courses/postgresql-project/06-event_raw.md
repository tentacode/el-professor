# 6 - la table events_raw

Vous devez créer un script `populate_raw_events` qui créera dans votre base de données `github_events` une table `events_raw` qui ne contient qu'une colonne `data_json` au format `JSONB`.

Chaque ligne de la table `events_raw` va contenir le json de chaque ligne de votre fichier `.json`. 

Dans ce script vous bouclerez sur chaque ligne du fichier JSON pour faire un `INSERT INTO` dans la table.

À la fin du script vous afficherez les 10 premières lignes de la table `events_raw`.

Resources :

* [JSON TYPES](https://www.postgresql.org/docs/11/datatype-json.html)
* [JSONB OPERATOR AND FUNCTIONS](https://www.postgresql.org/docs/11/functions-json.html)