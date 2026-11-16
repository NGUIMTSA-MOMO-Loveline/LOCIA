
# LOCIA – Projet académique

LOCIA est un projet de réseau social développé en équipe dans le cadre de notre formation. Le projet repose sur une architecture backend permettant de gérer les utilisateurs, les publications et les interactions sociales.

## Fonctionnalités prévues dans la structure du projet

- Gestion des utilisateurs et des profils.
- Création et gestion des publications.
- Gestion des commentaires.
- Système de likes.
- Système d'abonnement entre utilisateurs.

## Technologies utilisées

- **Langage :** PHP 8.2+
- **Framework :** Symfony 7.2
- **ORM :** Doctrine
- **Base de données :** PostgreSQL
- **Conteneurisation :** Docker Compose
- **Gestion des dépendances :** Composer

## Architecture du projet

```text
LOCIA/
├── config/          # Configuration Symfony
├── migrations/      # Migrations de la base de données
├── public/          # Point d'entrée de l'application
├── src/
│   ├── Controller/  # Contrôleurs
│   ├── Entity/      # Entités et modèles de données
│   ├── Form/        # Formulaires
│   └── Repository/  # Accès aux données
├── compose.yaml     # Configuration Docker
└── composer.json    # Dépendances PHP
```

## Modèle de données

Le projet comprend plusieurs entités :

- **User :** informations des utilisateurs et profils.
- **Post :** publications et images.
- **Comment :** commentaires associés aux publications.
- **Like :** gestion des mentions J'aime.
- **Follow :** relations entre utilisateurs.

## Installation

### Prérequis

- PHP 8.2 ou supérieur.
- Composer.
- Symfony CLI.
- Docker Desktop.

### 1. Cloner le dépôt

```bash
git clone URL_DU_DEPOT
cd LOCIA
```

### 2. Installer les dépendances

```bash
composer install
```

### 3. Configurer les variables d'environnement

Configurer les paramètres de connexion à PostgreSQL dans le fichier `.env.local`.

### 4. Démarrer la base de données

```bash
docker compose up -d
```

### 5. Exécuter les migrations

```bash
php bin/console doctrine:migrations:migrate
```

### 6. Lancer le serveur Symfony

```bash
symfony server:start
```

## Contexte du projet

Projet académique réalisé en équipe pour mettre en pratique le développement backend avec PHP et Symfony, la modélisation des données avec Doctrine et la gestion des relations entre entités.

---

**Projet académique – Développement Web**
