# Plateforme de gestion d'un réseau social pour sportifs

## Description
Cette plateforme permet aux utilisateurs de partager leurs performances sportives et d’interagir avec d’autres membres via des likes et des commentaires. Les fonctionnalités principales incluent l’ajout, la modification et la suppression d’activités sportives.

## Fonctionnalités
- 📌 **Ajout d'activités sportives** (course, natation, cyclisme)
- ✏️ **Modification des activités existantes**
- 🗑️ **Suppression d’activités**
- 👀 **Affichage des activités des utilisateurs**
- 🎨 **Interface moderne et responsive**

## Installation
### Prérequis
- Serveur local (XAMPP, WAMP, MAMP, ou LAMP)
- PHP 7.4+
- MySQL

### Étapes d’installation
1. **Cloner ou télécharger le projet**
2. **Importer la base de données**
   - Ouvrir phpMyAdmin
   - Créer une base de données : `sport_social_network`
   - Importer le fichier `db.sql`
3. **Configurer la connexion à la base de données**
   - Ouvrir `config.php`
   - Modifier si nécessaire :
   ```php
   $host = 'localhost';
   $dbname = 'sport_social_network';
   $username = 'root';
   $password = '';
   ```
4. **Lancer le projet**
   - Placer les fichiers dans `htdocs` (XAMPP) ou `www` (WAMP)
   - Accéder à `http://localhost/index.php`

## Structure du projet
```
📂 sport_social_network
 ├── 📄 index.php          # Affichage des activités
 ├── 📄 add_activity.php   # Ajout d'une activité
 ├── 📄 edit_activity.php  # Modification d'une activité
 ├── 📄 delete_activity.php # Suppression d'une activité
 ├── 📄 config.php         # Connexion et gestion des requêtes SQL
 ├── 📂 assets
 │   ├── 📄 styles.css      # Feuille de styles CSS
 ├── 📄 db.sql             # Fichier SQL pour créer la base de données
 ├── 📄 README.md          # Documentation du projet
```

## Usage
- Accéder à `index.php` pour voir les activités sportives
- Cliquer sur `Ajouter une activité` pour en ajouter une nouvelle
- Modifier une activité via `Modifier`
- Supprimer une activité via `Supprimer`

## Auteur
**[Ton Nom]** - 2025 🚀
