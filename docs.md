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

// Elequent queries :

App\Models\Author::get()  // get all items
App\Models\Author::with("profile")->get()  // get all items with relastion tab - tab   return array
App\Models\Author::with("profile")->first // get all items with relastion tab - tab   return item


App\Models\Author::with("profile")->where("id",1)->get()  // get all item  with relastion tab - tab - has id = 1
or ....->whereId(id)  or ...->whereKey(id)




------- LOG DB
  1 >>    DB::connection()->enableQueryLog();

     exp :         $posts = Post::all();

  3 >>  DB::getQueryLog()












000========================= - Querying relationship absence 


  --------  Construire des Requêtes simple et avancées 

  > $post = App\Models\Post::has('comments', ">=", "3")->with("comments")->get()



  > App\Models\Post::whereHas("comments", function($q){$q->where("content", "like", "%Qua%");})->with("comments")->get()


  $authors = Author::whereHas('books', function (Builder $query) {
                                                                  $query->where('title', 'like', 'PHP%');
                                                                  })->get();
 === SQL
 select * from authors WHERE EXISTS(SELECT * FROM authors WHERE authors.id = books.author_id and books.title like 'PHP%');





 >>> les postes qui ont n pas des commentaires 
 $post = App\Models\Post::doesntHave('comments')->get();

 >> les postes qui ont n pas des commantaire qui container la value ..X..(exp "yassine")
 > App\Models\Post::whereDoesntHave("comments", function($q){$q->where("content", "like", "%yassine%");})->get("id")










 ===================== Counting related models 


 // retourne pr chq poste nom des commontaire relais av
 > $post = App\Models\Post::withCounter("comments")->get()


 // cree un alias new_comments qui counte le nom de commentaires  > a 2024-....
 > $post = App\Models\Post::withCount(["comments", "comments as new_comments" => function($q){$q->where("created_at", ">", "2024-02-12 22:51:47");}])->get()