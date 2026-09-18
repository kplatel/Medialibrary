#  Application MVC - Gestion de Media(Livres et Films)

Application web dynamique développée en **PHP (Architecture MVC)** et stylisée avec **Tailwind CSS**. Elle permet de gérer un catalogue complet de médias (Livres et Films) avec une gestion orientée objet (POO), un espace utilisateur sécurisé (**Connexion / Inscription**) et des opérations CRUD complètes.

---

## Fonctionnalités principales
- **Architecture MVC (Modèle-Vue-Contrôleur)** : Séparation rigoureuse de la logique, des données et de l'affichage.
- **Espace Utilisateur** : Système sécurisé d'**Inscription** et de **Connexion** pour accéder à l'application.
- **Programmation Orientée Objet (POO)** : 
  - Classe mère `Media`
  - Classes filles `Book` et `Movie` (héritage et méthodes métiers dédiées).
- **Gestion des Médias (CRUD)** : Ajout, affichage en bibliothèque, modification et suppression pour les livres (pages) et les films (durée, genre, réalisateur).
- **Interface Moderne & Responsive** : Intégration complète de **Tailwind CSS** (formulaires harmonisés, boutons d'action et icônes).
- **Sécurité** : Requêtes préparées PDO contre les injections SQL et protection anti-null (`?? ''`).

---

## Prérequis techniques
- Un serveur local (**WampServer**, **XAMPP** ou **Laragon**) avec **PHP 8.0+**.
- Un serveur de base de données **MySQL** ou **MariaDB**.

---

## ⚙️ Installation et Configuration

1. **Cloner ou télécharger le dépôt** dans le dossier de votre serveur local (ex: `C:\wamp64\www\Bachelor\TP_2`) :
   ```bash
   git clone [https://github.com/TON_PSEUDO/NOM_DU_REPO.git](https://github.com/TON_PSEUDO/NOM_DU_REPO.git)
