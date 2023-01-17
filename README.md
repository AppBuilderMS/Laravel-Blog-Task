
<p align="center"><img src="logo.svg" width="300" alt="logo"></p>

![Laravel-Blog-Task](https://user-images.githubusercontent.com/109177230/212639817-4e4c4bb5-16d3-4106-ad6f-4a05752d1df1.png)



# About Laravel-Blog-Task


- Laravel project build using livewire.
- Use laravel bootstrap auth ui.
- Permissions for admin and writer using middleware.
- Dashboard for each user according to his role writer or admin.
- VerifyIsAdmin middleware to check the user is an admin.
- VerifyPostOwner middleware to check whether the user is the admin or the user's post owner.
- VerifyCommentOwner middleware to check whether the user is admin or user comment owner.
- Dashboard route folder with web file for dashboard routs and web file for frontend routs.
- Create accessors in models.
- Using soft delete for posts and comments.
- Live time validation using livewire.
- Using helper functions from the helper functions file.
- Using seeder for dummy data.
- Delete post's comments with post delete because of relations.
- Delete user's posts and comments with user delete because of relations.
- Make custom 404 and 403 error page.


## Quickstart

- Copy .env.example file and rename it to .env and set the database name.
- Create your database.

````
composer install

Add herperFunctions file to composer.json like that:

"autoload": {
    "psr-4": {
        "App\\": "app/",
        "Database\\Factories\\": "database/factories/",
        "Database\\Seeders\\": "database/seeders/"
    },
    "files": [
        "App/Http/helperFunctions.php"
    ]
},
    
composer dump-autoload

npm install
npm run build

php artisan key:generate
php artisan migrate:fresh --seed

/** For any route problems **/
php artisan optimize

/** For view problems **/
php artisan view:cache
php artisan view:clear

````

- Admin mail:  admin@admin.com
- Passwords for admin and all users:  password
- After login, you will be redirected to the blog home page and the nav bar will contain a dropdown link with sub links (dashboard link and logout link).






