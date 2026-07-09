start:
	docker compose up -d

	sleep 5

	mariadb -h 127.0.0.1 -P 3306 -u root -p proddb < ./db_backups/data-dump.sql


stop:
	mv ./db_backups/data-dump.sql ./db_backups/data-dump.sql.old
    
	mariadb-dump -h 127.0.0.1 -P 3306 -u root -p proddb > ./db_backups/data-dump.sql

	docker compose down -v


restart:
	make stop
	sleep 5
	make start


restore:
	rm ./db_backups/data-dump.sql
	mv ./db_backups/data-dump.sql.old ./db_backups/data-dump.sql
