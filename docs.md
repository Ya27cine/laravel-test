php artisan serve


// cree un model et sa migration
php artisan make:model nom_modele_singile  --Migrations

// exec toutes les migration 
php artisan migrate

php artisan tinker



// ======= TINKER 
 $author->profile()->save($profile);
 or
 > $profile->author()->associate($author)->save()