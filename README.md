# README

## Introduction

Ce projet utilise Docker Compose pour déployer une application PHP avec un serveur Apache, deux bases de données MySQL distinctes (Infinitea et Elsan), et des instances de phpMyAdmin pour administrer chacune des bases de données.


## Lancer le projet

### Étape 1 : Cloner le dépôt github 
   `git clone https://github.com/malibu1106/portfolio`   
   `cd portfolio`
   
### Étape 2 : Lancer les conteneurs avec Docker



Une fois dans le répertoire du projet, exécutez la commande suivante pour construire et démarrer les conteneurs Docker :
`docker-compose up --build`


Les services suivants seront accessibles :


- **Application PHP** : [http://localhost:8001](http://localhost:8001)
- **phpMyAdmin pour Infinitea** : [http://localhost:8082](http://localhost:8082)
- **phpMyAdmin pour CE Elsan** : [http://localhost:8081](http://localhost:8081)
- **Base de données MySQL pour Infinitea** : [http://localhost:3365](http://localhost:3365)
- **Base de données MySQL pour CE Elsan** : [http://localhost:3366](http://localhost:3366)


> **Remarque :** Les bases de données MySQL seront automatiquement configurées avec les données situées dans le répertoire `./data`.

## Commandes Utiles


- **Arrêter les conteneurs** :  
  `docker-compose down`


- **Rebuild des conteneurs** :  
  `docker-compose up --build`

## Configuration des services

### 1. PHP avec Apache
- **Image :** `php:8.3-apache`
- **Nom du conteneur :** `portfolio`
- **Ports exposés :** `8001:80` (accessible sur [http://localhost:8001](http://localhost:8001))
- **Volumes :** Monte le dossier local `./src` dans `/var/www/html` du conteneur.
- **Build context :** Utilise un fichier `Dockerfile` pour la configuration personnalisée.

### 2. Base de données MySQL - Infinitea
- **Image :** `mysql:8.0`
- **Nom du conteneur :** `infinitea_mysql8_0`
- **Command :** `--default-authentication-plugin=mysql_native_password`
- **Variables d’environnement :**
  - `MYSQL_ROOT_PASSWORD`: `root`
  - `MYSQL_DATABASE`: `infinitea`
  - `MYSQL_USER`: `infinitea`
  - `MYSQL_PASSWORD`: `infinitea_password`
- **Volumes :** Monte le dossier local `./data/infinitea` dans `/docker-entrypoint-initdb.d` pour initialiser la base.
- **Ports exposés :** `3365:3306` (accessible sur `localhost:3365`).

### 3. Base de données MySQL - Elsan
- **Image :** `mysql:8.0`
- **Nom du conteneur :** `elsan_mysql8_0`
- **Command :** `--default-authentication-plugin=mysql_native_password`
- **Variables d’environnement :**
  - `MYSQL_ROOT_PASSWORD`: `root`
  - `MYSQL_DATABASE`: `elsan`
  - `MYSQL_USER`: `elsan_admin`
  - `MYSQL_PASSWORD`: `elsan_password`
- **Volumes :** Monte le dossier local `./data/elsan` dans `/docker-entrypoint-initdb.d` pour initialiser la base.
- **Ports exposés :** `3366:3306` (accessible sur `localhost:3366`).

### 4. phpMyAdmin pour Infinitea
- **Image :** `phpmyadmin/phpmyadmin`
- **Nom du conteneur :** `portfolio_phpmyadmin_infinitea`
- **Variables d’environnement :**
  - `PMA_ARBITRARY`: `1`
  - `PMA_HOST`: `db_infinitea` (connexion à la base Infinitea)
  - `PMA_USER`: `root`
  - `PMA_PASSWORD`: `root`
  - `UPLOAD_LIMIT`: `20M`
- **Ports exposés :** `8082:80` (accessible sur [http://localhost:8082](http://localhost:8082)).

### 5. phpMyAdmin pour Elsan
- **Image :** `phpmyadmin/phpmyadmin`
- **Nom du conteneur :** `portfolio_phpmyadmin_elsan`
- **Variables d’environnement :**
  - `PMA_ARBITRARY`: `1`
  - `PMA_HOST`: `db_elsan` (connexion à la base Elsan)
  - `PMA_USER`: `root`
  - `PMA_PASSWORD`: `root`
  - `UPLOAD_LIMIT`: `20M`
- **Ports exposés :** `8081:80` (accessible sur [http://localhost:8081](http://localhost:8081)).
