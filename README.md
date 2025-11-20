================================================================================

# README | 🥢 COOKASIAN | English Version

# PHP MVC Project – Asian Recipes Website

================================================================================

Asian recipes blog built with:

- Custom PHP 8.2 MVC
- SCSS
- MySQL
- Docker
- Native JavaScript (no framework)

Optimized for:

- Mobile (iPhone SE)
- Performance
- SEO
- Accessibility
- Compliance with the French RNCP DWWM certification

================================================================================

# 📌 Table of Contents

================================================================================

- Overview
- Features
- Technologies
- Installation
- Daily workflow
- Project structure
- MVC architecture
- Website routes
- Database
- Security
- Performance
- Accessibility
- Tests
- Current limitations
- Roadmap & planned improvements
- Author

================================================================================

# 🥡 Overview

================================================================================

Cookasian is a handmade Asian recipe website, built without any framework, to demonstrate:

- a clean MVC architecture
- a complete relational database
- secure user management
- a modern mobile-first interface
- development aligned with RNCP standards (CCP1 & CCP2)

================================================================================

# 🌟 Features

================================================================================

# 👤 User Account

- Register
- Log in
- Log out
- Edit profile
- Personal account page (“My Account”)
- Favorites list

# ⭐ Favorites

- Add / remove a favorite
- Dynamic display (logged in / logged out)
- Icons adapted for desktop / mobile
- Visual toast notifications for add / remove
- Grid display (up to 3 columns on desktop)

# 🍜 Recipes

- Full recipe listing
- Filters:
  → by country (A–Z)
  → alphabetical sort (A–Z)
  → by preparation time
  → by cooking time
  → by difficulty
  → most recent

- Individual recipe page
- Responsive images (400 / 800 / 1200)
- Fullscreen zoom with lightbox
- Back button
- Hover micro-interactions

# 📱 Mobile / Responsive

- Fixed bottom mobile menu
- Dedicated iPhone SE adjustments
- Laptop / tablet adjustments (≥ 481px – 990px)
- Adaptive grids
- Re-scaled icons

# ✉️ Contact

- Contact form
- Server-side validation
- Success / error messages
- Contact details block

# 🌈 Design & UI

- Clear SCSS structure (utils, layout, pages, components)
- Reusable buttons
- Consistent recipe cards
- Lighthouse-validated color contrasts

================================================================================

# 🛠️ Technologies

================================================================================

- PHP 8.2
- MySQL 8
- SCSS
- Docker
- Nginx (inside the parent developpement-web/ project)
- Composer
- Native JavaScript
- PSR-4 autoload via Composer
- SCSS compilation via Node (npm run watch)

================================================================================

# 🐳 Installation

================================================================================

1️⃣ Requirements

- Docker Desktop
- Git
- Composer (Windows local installation)
- Chrome browser

2️⃣ Clone the project

git clone https://github.com/mnzv38/cookasian
cd cookasian

3️⃣ Start Docker

docker compose up -d

Website available at: http://cookasian.localhost:8080/

4️⃣ Import the database
→ phpMyAdmin → import cookasian.sql

5️⃣ Start SCSS watch

docker compose exec node npm run watch

6️⃣ Regenerate Composer autoload (Windows local)

composer dump-autoload

================================================================================

# 📂 Daily workflow

================================================================================

1. Open Docker Desktop
2. In VS Code terminal → go to developpement-web/
3. docker compose up -d
4. Open the website: http://cookasian.localhost:8080/
5. Start SCSS watch:
   docker compose exec node npm run watch

================================================================================

# 🧱 Technical project structure

================================================================================

cookasian/
│
├── app/
│ ├── Controllers/
│ ├── Models/
│ ├── Views/
│ ├── Router.php
│ └── routes.php
│
├── public/
│ ├── index.php
│ ├── assets/
│ ├── css/
│ ├── images/
│ └── js/
│
├── src/
│ ├── pages/
│ ├── accueil/
│ ├── auth/
│ ├── compte/
│ ├── contact/
│ ├── erreurs/
│ ├── notre-histoire/
│ └── recettes/
│
├── sql/
│ └── cookasian.sql
│
├── tests/
│ (PHPUnit-ready structure)
│
├── docs/
│ (internal notes, screenshots, audit, project documentation)
│
├── vendor/
│
├── composer.json
├── README_FR.md
└── README.md (English version)

================================================================================

# 🏛️ MVC Architecture

================================================================================

# Controllers

Manage the logic: Recipes, Account, Auth, Favorites, Contact.

# Models

Secure PDO queries:

- UsersModel
- RecettesModel
- FavorisModel

# Views

Semantic HTML templates, no unnecessary tags.

# Router

Single file listing all website routes.

================================================================================

# 🧭 Website Routes

================================================================================

GET / Home
GET /recettes Recipe list
GET /recettes/{slug} Recipe page
GET /notre-histoire About page
GET /contact Contact page
POST /contact Send form

GET /connexion Login form
POST /connexion Login processing
GET /inscription Registration form
POST /inscription Create user
GET /deconnexion Logout

GET /mon-compte User dashboard
GET /mon-compte/modifier Edit profile
POST /mon-compte/modifier Save profile updates

GET /favoris/ajouter/{id} Add favorite
GET /favoris/supprimer/{id} Remove favorite

================================================================================

# 🗄️ Database

================================================================================

# Main tables

- users
- recettes (recipes)
- ingredients
- etapes (steps)
- favoris (pivot table)

# Key principles

- 1-N and N-N relationships
- Referential integrity
- Sanitized fields
- Prepared statements
- No sensitive data stored in plain text

================================================================================

# 🔐 Security

================================================================================

- htmlspecialchars()
- password_hash()
- password_verify()
- Prepared PDO queries
- requireLogin()
- Secure sessions
- No AJAX → no exposed API
- Server-side filtering

================================================================================

# ⚡ Performance

================================================================================

- Multiple image sizes (400 / 800 / 1200)
- Compression
- Native lightbox
- Optimized CSS
- Minimal JS
- Lighthouse results:
  ✅ Performance 100
  ✅ Accessibility 100
  ✅ Best practices 100
  ✅ SEO 100

================================================================================

# ♿ Accessibility

================================================================================

- AA color contrast (WCAG) → Contrast ≥ 4.5:1
- focus-visible
- Meaningful alt text
- Semantic HTML tags
- Properly linked labels / inputs

================================================================================

# 🧪 Tests

================================================================================

# Manual tests

- Global navigation
- Recipes
- Login / registration
- Favorites management
- iPhone SE responsive
- 404 page

# Technical tests

- Valid HTML
- Password hashing & verification
- Lighthouse audit
- Router loading & route resolution tests
- PSR-4 autoload validation
- PHPUnit tests

/tests/
│
├── AuthTest.php
└── RouteurTest.php

Run all tests with:
php vendor/bin/phpunit --testdox

================================================================================

# ❗ Current Limitations

================================================================================

- No admin back-office
- No full pagination
- No visual indicator showing if a recipe is already a favorite
- No favorite counter for the user
- No recipe image upload
- No multi-ingredient filter
- No rating system
- No user comments system
- No complete English version

================================================================================

# 🧭 Roadmap & planned improvements

================================================================================

- Pagination
- Back-office
- Image upload
- Advanced filters
- User ratings
- Favorite icon visible on recipe cards
- Favorite counter in the user dashboard
- Full English version

================================================================================

## 👩‍💻 Author

================================================================================

**Mélodie VANG**
Web Developer – DWWM Training
GitHub: https://github.com/mnzv38

Project: **Cookasian (Custom MVC)**
