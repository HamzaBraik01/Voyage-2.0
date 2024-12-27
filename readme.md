# Système de Gestion d'Agence de Voyage

## Objectifs du Projet
Ce projet vise à développer un système de gestion pour une agence de voyage, permettant aux utilisateurs de gérer efficacement leurs réservations, d'explorer diverses activités touristiques et de bénéficier d'une interface conviviale. Les utilisateurs peuvent s'inscrire, se connecter, et interagir avec les fonctionnalités de l'application en fonction de leur rôle.

- **Utilisateurs (Clients)** :
  - Découvrir et consulter les activités proposées (vols, hôtels, circuits).
  - S’inscrire, se connecter et réaliser des réservations (choisir la date, l'heure et le type d'activité).
  
- **Administrateurs** :
  - Se connecter et gérer les utilisateurs et les activités.
  - Superviser les réservations, les confirmer ou les annuler si nécessaire.

## Fonctionnalités Principales :
### Authentification et Autorisation :
- Inscription et connexion sécurisées pour les utilisateurs.
- Gestion des rôles :
  - **Administrateur** : Accès à la gestion globale du système.
  - **Client** : Accès aux fonctionnalités de réservation.
  - **Visiteur** : Consultation des offres sans inscription.

### Page Utilisateur (Client) :
- Consultation des activités disponibles et réservation d'une activité avec des options de date et d'heure.
- Gestion des réservations : consulter l’historique, modifier ou annuler des réservations.

### Page Sub_Administrateur (Dashboard) :
- Gestion des utilisateurs : ajouter, modifier ou supprimer des comptes utilisateurs.
- Gestion des activités : ajouter, modifier ou supprimer des activités existantes.
- Supervision des réservations : visualiser les réservations en cours et gérer leur statut.
### Page Sup_Administrateur (Dashboard) :
- Gestion des Sub_Administrateur : ajouter, modifier ou supprimer des comptes Sub_Administrateur.
## Design :
- **Responsive Design** : Le site doit être compatible avec toutes les tailles d’écrans (mobile, tablette, desktop).
- **Esthétique** : Design moderne et attrayant, avec une interface utilisateur intuitive pour une navigation fluide.

## Fonctionnalités JavaScript :
- **Modals Dynamiques** : Utilisation de modals pour afficher des informations sans recharger la page.

## Sécurité des Données :
- **Hashage des Mots de Passe** : Utilisation de techniques sécurisées pour le hashage des mots de passe.


## Technologies Utilisées
### Frontend :
- **HTML5** : Structure et sémantique moderne.
- **Tailwind CSS** : Framework CSS utilitaire pour un design responsive.
- **JavaScript** : Interactions dynamiques et validations côté client.

### Backend :
- **PHP (POO)** : Programmation orientée objet pour une architecture modulaire.
- **MySQL/PDO** : Gestion sécurisée des données.

## Conclusion
Ce système de gestion d'agence de voyage a pour but de faciliter l'accès aux services touristiques tout en offrant une expérience utilisateur fluide et sécurisée. En intégrant des fonctionnalités robustes et une interface conviviale, nous visons à répondre aux besoins des utilisateurs tout en soutenant les petites agences de voyage locales.