# 7 - Installation de pgAdmin

Téléchargez et installez pgAdmin.

Créer une connection vers le serveur PostgreSQL depuis pgAdmin (127.0.0.1:5432, user : super_admin, password: 12345).

Pour pouvoir se connecter à PostgreSQL depuis n'importe quelle machine distante, changer la configuration de `listen_addresses` en "*" (avec un `ALTER SYSTEM SET`) dans un script `pg_admin_install` (et redémarrez postgresql).

Ensuite il faut modifier `pg_hba.conf` pour ajouter une règle de connection à distance avec l'ip voulue (pour vagrant c'est 10.0.2.2, mais essayez aussi avec l'ip de votre binome). Redémarer le serveur.

Modifier le pg_hba.conf qui est dans votre github (/etc/pg_hba.conf) qui est une copie de `/etc/postgresql/11/main/pg_hba.conf`.