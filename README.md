# tp2-cadriciel
Lien github [est içi](https://github.com/sadektouati/tp2cadriciel.git)

#télécharger le depot de tp 1 depuis github.com

 composer update
 composer require laravel/ui:*
 php artisan ui bootstrap --auth
 npm install
 npm run dev


php artisan make:controller LangueController
php artisan make:middleware Langue
php artisan make:controller MonArticleController -r -m Article
php artisan make:controller ArticleController -r -m Article

composer require doctrine/dbal
php artisan make:migration changement_email_etudiants_table
php artisan make:migration create_articles_table
php artisan migrate

php artisan make:factory ArticleFactory –m Article
php artisan tinker
    DB::table('users')->insert(['name' => 'admin', 'email' => 'admin@email.com', 'password' => Hash::make('admin123')]);
    \App\Models\Ville::factory()->times(15)->create();
    DB::table('etudiants')->insert(['nom' => 'Saddek Touati', 'date_de_naissance' => '1985-01-01', 'adresse' => 'some address', 'phone' => '05555558566', 'email' => 'etudiant@email.com', 'ville_id' => 1]);
    DB::table('etudiants')->insert(['nom' => 'Saddek Touati', 'date_de_naissance' => '1985-01-01', 'adresse' => 'some address', 'phone' => '05555338566', 'email' => 'etudiant1@email.com', 'ville_id' => 2]);
    DB::table('etudiants')->insert(['nom' => 'Saddek Touati', 'date_de_naissance' => '1985-01-01', 'adresse' => 'some address', 'phone' => '05555228566', 'email' => 'etudiant2@email.com', 'ville_id' => 3]);
    \App\Models\Etudiant::factory()->times(100)->create();
    \App\Models\Article::factory()->times(100)->create();


php artisan make:migration create_files_table
php artisan make:controller FileController -r -m File
php artisan make:factory FileFactory –m File

php artisan storage:link

