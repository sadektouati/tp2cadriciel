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
php artisan make:migration create_articles_table  
php artisan migrate  

php artisan make:factory ArticleFactory –m Article  
php artisan tinker  
    DB::table('users')->insert(['name' => 'admin', 'email' => 'admin@email.com', 'password' => Hash::make('admin123')]);  
    \App\Models\Ville::factory()->times(15)->create();  

    DB::table('etudiants')->insert(['nom' => 'Saddek Touati', 'date_de_naissance' => '1985-01-01', 'adresse' => 'some address', 'phone' => '05554458566', 'email' => 'etudiant@email.com', 'ville_id' => 1]);  

    DB::table('users')->insert(['name' => 'Saddek Touati', 'email' => 'etudiant@email.com', 'password' => Hash::make('etudiant123')]);  

    DB::table('etudiants')->insert(['nom' => 'Fatah Touati', 'date_de_naissance' => '1985-01-01', 'adresse' => 'some address', 'phone' => '05554411566', 'email' => 'etudiant1@email.com', 'ville_id' => 1]);  

    DB::table('users')->insert(['name' => 'Fatah Touati', 'email' => 'etudiant1@email.com', 'password' => Hash::make('etudiant123')]);  

    DB::table('etudiants')->insert(['nom' => 'Samir Touati', 'date_de_naissance' => '1985-01-01', 'adresse' => 'some address', 'phone' => '05254411566', 'email' => 'etudiant2@email.com', 'ville_id' => 1]);  
    
    DB::table('users')->insert(['name' => 'Samir Touati', 'email' => 'etudiant2@email.com', 'password' => Hash::make('etudiant123')]);  


    \App\Models\Etudiant::factory()->times(100)->create();  

    \App\Models\Article::factory()->times(100)->create();  


php artisan make:migration create_files_table  
php artisan make:controller FileController -r -m File  
php artisan make:factory FileFactory –m File  

php artisan storage:link  

test user  
  email: etudiant2@email.com  
  password: etudiant123
