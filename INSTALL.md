# Installation

1. Git clone git@github.com:Koialle/KEEG.git
2. dans le dossier KEEG/Symfony : 
    
    
    php composer.phar self-update
    php composer.phar install
    php composer.phar update
    php app/console cache:clear --env=prod


3. Créer la base de données :

    
    php app/console doctrine:database:create
    php app/console doctrine:schema:update --dump-sql
    php app/console doctrine:schema:update --force


4. Aller à l'URL : [http://localhost/keeg/symfony/web/app_dev.php/](http://localhost/keeg/symfony/web/app_dev.php/)
