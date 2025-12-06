# 🛒 One Click — Plateforme E‑commerce Responsive

## 📋 Contexte

One Click est une plateforme e-commerce moderne, intuitive et entièrement responsive développée pour faciliter la vente en ligne. Elle répond aux exigences actuelles des commerçants souhaitant automatiser leur activité, améliorer l’expérience client et centraliser la gestion des produits, commandes et paiements.

Le projet a été réalisé dans un contexte pédagogique, permettant de mettre en pratique des compétences en développement web complet (front-end + back-end) tout en respectant une méthodologie structurée.

## 🖼️ Logo de l'application

![Logo One Click](./logo.png)

---

## 🎯 Problématique

De nombreux sites e-commerce souffrent encore de limitations :

* Gestion semi‑manuelle des produits et commandes
* Absence de centralisation des données
* Mauvaise synchronisation des stocks
* Faible automatisation des processus
* Expérience utilisateur peu optimisée
* Manque de traçabilité et de rapports statistiques

Ces problèmes nuisent à la productivité des gestionnaires et à la satisfaction des clients.

---

## 🎯 Objectifs

### 🎯 Objectif Principal

Développer une plateforme e-commerce complète, sécurisée et performante permettant aux commerçants de gérer efficacement leurs produits, commandes, utilisateurs et paiements, tout en offrant une excellente expérience aux clients.

### 🎯 Objectifs Spécifiques

* **Automatisation des processus** : commandes, stocks, paiements
* **Centralisation des données** : produits, utilisateurs, ventes, messages
* **Expérience utilisateur fluide** : interface rapide, claire et responsive
* **Suivi des ventes** via tableau de bord et statistiques
* **Sécurisation** de l’authentification et de la gestion des données
* **Traçabilité** : suivi des commandes, paiements et messages clients
* **Optimisation marketing** : gestion des abonnés newsletter

---

## 🛠️ Technologies Utilisées

### 🖥️ Frontend

| Technologie | Rôle                                      |
| ----------- | ----------------------------------------- |
| HTML5       | Structure des pages                       |
| CSS3        | Design et mise en forme                   |
| JavaScript  | Interactivité et comportements dynamiques |
| Bootstrap   | Responsive design et composants UI        |

### 🔧 Backend

| Technologie        | Rôle                             |
| ------------------ | -------------------------------- |
| PHP 8+             | Langage serveur                  |
| Laravel            | Framework MVC robuste            |
| Blade              | Moteur de templates              |
| Spatie Permissions | Gestion des rôles et permissions |
| Chart.js           | Graphiques du tableau de bord    |

### 🗄️ Base de Données

| Technologie | Rôle                          |
| ----------- | ----------------------------- |
| MySQL       | Base de données relationnelle |

### ⚙️ Outils de Développement

| Outil              | Rôle                                 |
| ------------------ | ------------------------------------ |
| Visual Studio Code | Environnement de développement       |
| Composer           | Gestionnaire de dépendances PHP      |
| XAMPP              | Serveur local (Apache, MySQL)        |
| Git & GitHub       | Gestion de versions                  |
| Canva              | Conception des ressources graphiques |

---

## 💻 Commandes d’installation

### 1️⃣ Cloner le projet

```bash
git clone https://github.com/votre-lien/oneclick-ecommerce.git
cd oneclick-ecommerce
```

### 2️⃣ Installer les dépendances

```bash
composer install
npm install
npm run build
```

### 3️⃣ Configurer l'environnement

Créer un fichier `.env` :

```bash
cp .env.example .env
php artisan key:generate
```

Configurer votre base MySQL dans `.env`.

### 4️⃣ Exécuter les migrations + seeders

```bash
php artisan migrate --seed
```

### 5️⃣ Lancer le serveur

```bash
php artisan serve
```

---

## 🛡️ Sécurité

* Authentification sécurisée via Jetstream / Laravel Auth
* Gestion des rôles et permissions (Admin / Client)
* Protection CSRF, XSS et validation des formulaires
* Hashage des mots de passe via Bcrypt
* Sessions sécurisées

---

## 🧑‍💼 Auteurs

* **AIT ICHOU Rafik**
* **AIT HMAD Soufaine**
* **SALIHI Yassine**

Encadré par : **Pr. OUMAIMA STITINI**

---

## 📄 Licence

Projet académique – libre d’utilisation à des fins pédagogiques.

---

## 📅 Dernière mise à jour

Mai 2025
