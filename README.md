<img src="./imgs/logo/Smugglers Logo.png" alt="SMUGGLERS"/>

E-commerce di album musicali sviluppato in **PHP + MariaDB**, containerizzato con **Docker Compose**. Progetto per il corso di Basi di Dati presso Università degli Studi di Parma.

## Funzionalità

- Catalogo album/band/artisti, ordinamento e ricerca
- Pagine di dettaglio album e band
- Carrello e checkout
- Login/logout con sessione + cookie
- Pannello admin per gestire album, band, artisti, brani, generi e utenti

## Stack

PHP 8.2 (Apache, PDO) · MariaDB · Bootstrap 5 · JS vanilla · Adminer · Docker Compose

## Struttura

```
css/          stile
js/           script client
php/          pagine e logica applicativa
imgs/         immagini (album, band, artisti, utenti, logo)
db_backups/   schema, dump e migrazioni del database
index.php     homepage
docker-compose.yml
makefile
```

## Avvio

Richiede Docker, Docker Compose e un file `.env` con le variabili del database (`MYSQL_ROOT_PASSWORD`, `MYSQL_DATABASE`, `MYSQL_USER`, `MYSQL_PASSWORD`, `MARIADB_DATA_DIR`, `MARIADB_LOG_DIR`, `VOLUME`).

```bash
make start
```

- Sito: <http://localhost:8888>
- Adminer: <http://localhost:8080>

Per fermare (con backup automatico del DB):

```bash
make stop
```

Altri comandi: `make restart`, `make restore`, `make db_dump`.

## Database

Tabelle principali: `user`, `band`, `artist`, `genre`, `album`, `song`, più le relazioni `members`, `published`, `ispartof`, `soundlike`, `sale`, `cart`. Schema completo in `db_backups/schema.sql`.
