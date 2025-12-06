# 🤝 Guide de Contribution — One Click E‑Commerce

Merci de votre intérêt pour contribuer au projet **One Click**, une plateforme e‑commerce moderne et responsive. Ce guide explique comment participer efficacement au développement du projet.

---

## 🧩 Comment Contribuer

Vous pouvez contribuer de plusieurs façons :

* 🚀 Proposer une nouvelle fonctionnalité
* 🐛 Signaler ou corriger un bug
* 📝 Améliorer la documentation
* 🎨 Améliorer l’interface utilisateur
* ⚙️ Optimiser le code ou les performances

---

## 🛠️ Prérequis

Avant de commencer, assurez-vous d’avoir installé :

* PHP 8+
* Composer
* Laravel
* MySQL
* Node.js & NPM
* Git

---

## 🔧 Installation du Projet

```bash
git clone https://github.com/RAFIKAITICHOU/Plateforme-E-commerce.git
cd Plateforme-E-commerce
composer install
npm install
npm run build
cp .env.example .env
php artisan key:generate
php artisan migrate --seed
php artisan serve
```

---

## 🌿 Workflow Git

Merci de respecter la structure suivante :

### 1️⃣ Créer une branche

```bash
git checkout -b feature/nom-de-la-fonctionnalité
```

### 2️⃣ Faire vos changements

* Suivre les standards Laravel
* Utiliser un code propre et commenté
* Respecter les conventions PSR-12

### 3️⃣ Commits clairs

```bash
git commit -m "feat: ajout de la gestion du panier"
```

Exemples de préfixes recommandés :

* `feat:` nouvelle fonctionnalité
* `fix:` correction de bug
* `docs:` documentation
* `refactor:` amélioration du code
* `style:` mise en forme
* `perf:` optimisation

### 4️⃣ Pousser la branche

```bash
git push origin feature/nom-de-la-fonctionnalité
```

### 5️⃣ Créer une Pull Request

Votre PR doit :

* Décrire le problème résolu
* Expliquer la solution proposée
* Joindre des captures si nécessaire
* Mentionner les issues concernées

---

## 🧪 Tests

Avant toute PR, assurez-vous que :

* Le projet fonctionne sans erreurs
* Toutes les pages sont accessibles
* Les fonctionnalités modifiées sont testées
* Aucun fichier inutile n’est ajouté

---

## 🧹 Règles de Qualité

* Suivre l’architecture MVC
* Respecter les bonnes pratiques Laravel
* Ne pas pousser le dossier `vendor/`
* Ne pas pousser le fichier `.env`
* Utiliser des migrations pour la base de données

---

## 🔐 Sécurité

Si vous découvrez une faille, **ne créez pas d’issue publique**.
Contactez plutôt l’équipe via :
📩 **[rafikaitichou@gmail.com](mailto:rafikaitichou@gmail.com)**

---

## 💬 Communication

Pour toute question :

* Ouvrir une *issue* GitHub
* Ou discuter via les Pull Requests

---

## 🙏 Remerciements

Merci pour votre contribution au projet **One Click** ! Chaque amélioration aide à créer une plateforme e‑commerce plus complète, moderne et accessible.

---

## 📅 Dernière mise à jour

Mai 2025
