# 🔐 Security Policy — One Click E‑Commerce

## 📣 Signaler une Vulnérabilité

Si vous découvrez une faille de sécurité, veuillez suivre ces étapes :

1. **Ne publiez jamais l'information dans une issue publique.**
2. Envoyez un email sécurisé à : **[rafikaitichou@gmail.com](mailto:rafikaitichou@gmail.com)**
3. Incluez :

   * Une description détaillée du problème
   * Les étapes pour reproduire la vulnérabilité
   * Les fichiers concernés ou extraits de code
   * L’impact potentiel (accès non autorisé, injection, fuite de données, etc.)

⏳ **Engagement de réponse :**

* Réponse initiale dans les **48 heures**
* Plan de correction dans les **5 jours ouvrables**

---

## 🔐 Mesures de Sécurité Implémentées

### ✔️ Authentification & Sessions

* Authentification Laravel sécurisée (Jetstream / Laravel Auth)
* Hashage des mots de passe avec **BCrypt**
* Sessions protégées (`Secure`, `HttpOnly`, `SameSite` activés en production)
* Vérification email pour les utilisateurs

### ✔️ Protection de l’Application

* **CSRF Protection** activée sur toutes les requêtes POST
* Filtrage et validation stricte des entrées utilisateur
* Limitations sur les tentatives de connexion
* Middleware d’autorisation (Admin / Client)

### ✔️ Communication Sécurisée

* Support complet du protocole **HTTPS**
* Recommandation d’utiliser **Let’s Encrypt** pour le certificat SSL
* Aucune donnée sensible non chiffrée

### ✔️ Base de Données

* Mots de passe hashés (BCrypt)
* Aucune donnée critique stockée en clair
* Prévention des injections SQL via **Eloquent ORM**
* Sauvegardes régulières recommandées

### ✔️ Fichiers & Téléversements

* Validation des extensions d’images
* Stockage dans des répertoires protégés
* Nettoyage automatique des fichiers orphelins (optionnel)

---

## 🔒 Bonnes Pratiques Recommandées

* Toujours mettre à jour Laravel, PHP, Composer et les dépendances
* N’utiliser que des packages vérifiés et maintenus
* Limiter les accès administrateurs
* Sauvegarder la base de données régulièrement
* Désactiver le mode debug (`APP_DEBUG=false`) en production

---

## 🤝 Divulgation Responsable

Nous encourageons fortement la divulgation responsable :

* Ne jamais exploiter une faille découverte
* Ne pas tenter d'accéder à des données sensibles
* Nous contacter immédiatement via le canal privé mentionné ci‑dessus

---

## 📅 Dernière Mise à Jour

Mai 2025
