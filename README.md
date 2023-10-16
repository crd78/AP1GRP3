# Projet Symfony CamEsthetique

Bienvenue dans le projet Symfony ! Ce projet est une application web construite en utilisant le framework Symfony, conçue pour [décrire brièvement la finalité de votre projet].

## Table des matières

- [Installation](#installation)
- [Configuration](#configuration)
- [Utilisation](#utilisation)
- [Créer Un Utilisateur](#créer-un-utilisateur-)

## Installation

Pour commencer à travailler avec ce projet, suivez les étapes d'installation ci-dessous :

1. Clonez ce dépôt :

   ```bash
   git clone https://github.com/votre-utilisateur/votre-projet.git
Accédez au répertoire du projet :
`cd votre-projet`

Installez les dépendances à l'aide de Composer :
`composer install`

## Configuration
N'oubliez pas d'allumer WampServer avant toute manipulation de la base de données.

Avant de pouvoir utiliser l'application, assurez-vous de configurer les paramètres nécessaires. Copiez le fichier .env en .env.local et ajustez les valeurs selon vos besoins. N'oubliez pas de configurer votre base de données.

`cp .env .env.local`

Pour créer la base de données et exécuter les migrations, utilisez la commande Symfony suivante :
`php bin/console doctrine:database:create`
`php bin/console doctrine:migrations:migrate`

## Utilisation

Maintenant que tout est configuré, vous pouvez lancer l'application en utilisant le serveur de développement intégré de Symfony :
`symfony server:start`

L'application sera disponible à l'adresse http://localhost:8000 par défaut.

## Créer un utilisateur :

Il suffit simplement d'aller sur la page inscription du site puis l'utilisateur sera enregistré en base de donnée.

Pour le mettre en mode administrateur, il faut aller dans la table "user" de la base de donnée nommée "app", trouver votre utilisateur, puis modifier la valeurs de la colonne "isVerified" à 1.