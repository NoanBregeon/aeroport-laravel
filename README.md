# aeroport-laravel

Petit projet Laravel pour gérer des terminals, halls et gates (portes).

Résumé
- Models: Terminal, Hall, Gate, User (role).
- Contrôleurs et vues basiques fournis.
- Migrations, factories et seeders inclus pour faciliter les tests.

Prérequis
- PHP 8.1+ (ou compatible avec votre composer.json)
- Composer
- SQLite (pour les tests) ou MySQL/Postgres pour développement
- Node/npm si vous utilisez Vite/Tailwind (optionnel pour les assets)

Installation (locale)
1. Cloner le dépôt
   - git clone <votre-repo> c:\code\aeroport-laravel
2. Installer les dépendances PHP
   - cd c:\code\aeroport-laravel
   - composer install
3. Copier l'environnement et générer une clé
   - cp .env.example .env
   - php artisan key:generate
4. Configurer la base de données dans .env
   - Pour les tests, Laravel utilise sqlite en mémoire par défaut (ou `:memory:`). Pour dev, configurez DB_CONNECTION=mysql et les paramètres.
5. Installer les assets (si nécessaire)
   - npm install && npm run dev (optionnel)

Migrations & Seeders
- Pour un état propre (recommandé en développement ou CI) :
  - php artisan migrate:fresh
  - php artisan db:seed
- Seeder admin par défaut :
  - Email: `admin@example.com`
  - Password: `password`

Résolution de l'erreur "table already exists" dans les tests
- Contexte : lors de ré-exécutions sur SQLite en environnement de test, certaines migrations peuvent tenter de recréer des tables;
- Solution rapide :
  - Utiliser `php artisan migrate:fresh --env=testing` avant d'exécuter les tests.
  - Les migrations du projet ont été adaptées pour utiliser `Schema::dropIfExists(...)` avant `Schema::create(...)` dans les fichiers create_* afin d'éviter l'erreur en environnement de test.
- Commandes utiles :
  - php artisan view:clear
  - php artisan cache:clear
  - php artisan config:clear
  - php artisan migrate:fresh --seed --env=testing

Tests
- Exécuter les tests :
  - ./vendor/bin/pest
  - ou php artisan test
- Générer le rapport de couverture :
  - ./vendor/bin/pest --coverage-html=coverage

Dépannage pour les tests (31 échecs)
- Vérifiez que les migrations se lancent proprement en environnement testing :
  - php artisan migrate:fresh --env=testing
- Si l'erreur "table already exists" persiste :
  - Supprimez le fichier sqlite utilisé par testing (si configuré sur disque) ou forcez `DB_CONNECTION=sqlite` et `DB_DATABASE=:memory:` dans phpunit.xml/phpunit.local.
- Vérifiez que les seeders créent l'utilisateur admin attendu pour les tests d'auth.
- Assurez-vous que les modèles castent correctement les champs (ex. `Gate::$casts['ouverte'] = 'boolean'`).
- Vider les caches (view, config) avant de relancer les tests.
- Consulter les logs dans storage/logs/laravel.log pour plus de détails.

Bonnes pratiques CI
- Toujours lancer `php artisan migrate:fresh --seed` dans le job CI avant `./vendor/bin/pest`.
- Utiliser une base en mémoire pour accélérer les tests (sqlite :memory:).

Besoin d'aide
- Si après ces étapes vous avez encore des échecs, copiez-collez ici le premier échec complet (stack trace) et je fournis les corrections ciblées (migrations, modèles ou tests).

