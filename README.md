# ✈️ Aeroport Laravel

Système de gestion aéroportuaire développé avec Laravel 11. Cette application permet de gérer les infrastructures aéroportuaires (Terminaux, Halls, Portes) et les opérations quotidiennes via des rôles distincts.

## 🚀 Fonctionnalités

- **Authentification & Rôles** : Système sécurisé avec distinction Admin / Opérateur.
- **Administration** : CRUD complet pour les Terminaux, Halls et Portes d'embarquement.
- **Espace Opérateur** : Dashboard dédié pour la gestion opérationnelle (ouverture/fermeture des portes, gestion du personnel).
- **Internationalisation** : Interface disponible en Français 🇫🇷 et Anglais 🇬🇧.
- **Interface** : Design moderne et responsive avec Tailwind CSS.

## 🛠️ Installation

1. **Cloner le projet**
   ```bash
   git clone https://github.com/NoanBregeon/aeroport-laravel.git
   cd aeroport-laravel
   ```

2. **Installer les dépendances**
   ```bash
   composer install
   npm install && npm run build
   ```

3. **Configuration**
   Copiez le fichier `.env.example` vers `.env` et configurez votre base de données (SQLite par défaut).
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

4. **Base de données**
   Lancez les migrations et les seeders pour initialiser la base de données et les comptes de test.
   ```bash
   php artisan migrate --seed
   ```

## 🧪 Comptes de test

Après avoir lancé les migrations (`php artisan migrate --seed`), deux comptes sont automatiquement créés :

### 👑 Administrateur
- **Email** : `admin@test.com`
- **Mot de passe** : `password`
- **Rôle** : Administrateur (accès total)

### 🛠️ Opérateur
- **Email** : `operator@test.com`
- **Mot de passe** : `password`
- **Rôle** : Operateur (accès limité)

> ⚠️ **Ne JAMAIS utiliser ces comptes en production.** Ils servent uniquement pour les tests ou la soutenance.

## 📚 Comment ça marche ?

### Rôle Administrateur
L'administrateur a accès au panneau de contrôle global. Il est responsable de la configuration de l'aéroport :
- **Terminaux** : Création et gestion des terminaux principaux.
- **Halls** : Ajout de halls dans les terminaux existants.
- **Gates (Portes)** : Configuration des portes d'embarquement dans les halls.

### Rôle Opérateur
L'opérateur a une vue limitée aux tâches quotidiennes et opérationnelles :
- **Gestion des Portes** : Ouvrir ou fermer une porte d'embarquement (Toggle).
- **Gestion du Personnel** : Ajuster le nombre de personnel requis dans un Hall spécifique pour assurer le bon fonctionnement.

## 💻 Stack Technique

- **Backend** : Laravel 11
- **Frontend** : Blade, Tailwind CSS
- **Base de données** : SQLite (par défaut) / MySQL

