# 8 - Insertion depuis le JSON

Vous devez créer un script `populate_events` qui remplira dans votre base de données `github_events` les table `events` "filles" que vous avez créer dans l'étape 3 "Héritage de tables".

Vous utiliserez une requête de la forme :

```sql
INSERT INTO push_events (
    date,
    actor_name,
    repository_name,
    nb_commits
) SELECT
    … -- Vos clauses select pour récupérer les valeurs depuis le JSON
FROM events_raw
WHERE data_json->'type' = 'PushEvents';
```

Si vous avez des tables pour `actor` et `repository`, peuplez d'abords ces tables là puis créez les clés étrangères ensuite.

Resources :

* [SQL INSERT INTO SELECT](https://dba.stackexchange.com/a/2974)
* [SQL INSERT](https://www.postgresql.org/docs/11/sql-insert.html)
* [JSONB OPERATOR AND FUNCTIONS](https://www.postgresql.org/docs/11/functions-json.html)