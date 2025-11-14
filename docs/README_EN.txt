================================================================================
📄 README | COOKASIAN | English Version
Custom PHP MVC Project – Asian Recipes Website
================================================================================


INTRODUCTION
------------
Cookasian is a small web project that I developed to better understand how a
dynamic website works in PHP, by coding everything myself without any framework.

The main goal is to understand what happens between the browser, the server,
the views, the controllers, the models, and the database.

The Asian cooking theme keeps the project visually pleasant while allowing
me to focus on the technical aspects.


WEBSITE FEATURES
----------------
The website includes:

- a homepage showcasing selected recipes
- a page listing all recipes
- a detailed page for each recipe
- a user account system:
    - registration
    - login
    - logout
- a favorites system linked to each connected user
- a contact page connected to MySQL
- a “Our Story” page (similar to “About us”)
- a mobile-first responsive design (optimized for iPhone SE width)

The global objective is to build a small but complete and functional website.


TECHNOLOGIES USED
-----------------
The project uses the following stack:

- PHP 8.2 with a custom-made MVC architecture
- MySQL using PDO with prepared statements
- SCSS compiled with Node Sass
- Native JavaScript
- Composer with PSR-4 autoload
- PHPUnit for backend unit tests
- Semantic HTML


PROJECT STRUCTURE
-----------------
Main directories:

- app/
    - Controllers/
    - Models/
    - Views/
    - Router.php
    - routes.php

- public/
    - index.php (single entry point)
    - assets/ (css, js, images)

- src/
    - SCSS (pages, layout, components, utils)

- sql/
    - SQL scripts (structure and data)

- tests/
    - unit tests

- vendor/
    - Composer dependencies

- docs/
    - internal notes and documentation


INSTALLATION
------------
1. Install PHP dependencies:
   composer install

2. Install SCSS dependencies:
   npm install

3. Compile SCSS:
   - watch mode:
       npm run watch
   - single build:
       npm run build

4. Import the SQL files from the "sql/" folder into MySQL.


RUNNING UNIT TESTS
------------------
The unit tests are located in the "tests" directory.

They check:
- the hashing and verification of passwords
- the registration and handling of routes in the router

Command to run the tests:

php vendor/bin/phpunit --testdox tests


SECURITY
--------
The project applies several good practices:

- hashed passwords (password_hash / password_verify)
- prepared SQL queries with PDO
- escaped output using htmlspecialchars
- strict MVC separation between logic, data, and display


SCSS COMPILATION
----------------
Main SCSS file:
src/main.scss

Generated CSS file:
public/assets/css/main.css


LOCAL DEVELOPMENT URL
---------------------
http://cookasian.localhost:8080/


GIT & REPOSITORY
----------------
GitHub repository:
https://github.com/mnzv38/cookasian

Useful commands:

git add .  
git commit -m "Cookasian project update"  
git push


CONCLUSION
----------
Cookasian is a simple but complete project, built to learn the fundamentals of
a dynamic PHP website: routing, views, models, security, MySQL interactions,
SCSS compilation, and unit testing.

The project remains easy to read, easy to understand, and easy to improve.
It can be used as a learning base or as a small technical showcase.
