
<p align="center"><img src="logo.svg" width="300" alt="logo"></p>


# About Laravel-Blog-Task


- Laravel project build using livewire
- Permissions for admin and writer using middleware
- Dashboard for each user according to his role writer or admin
- VerifyIsAdmin middleware to check the user is an admin
- VerifyPostOwner middleware to check whether the user is the admin or the user's post owner
- VerifyCommentOwner middleware to check whether the user is admin or user comment owner
- Dashboard route folder with web file for dashboard routs and web file for frontend routs 
- Create accessors in models
- Using soft delete for posts and comments
- Live time validation using livewire
- Using helper functions from the helper functions file
- Using seeder for dummy data


## Quickstart

- Copy .env.example file and rename it to .env and set the database name
- Create your database

````
php artisan migrate:fresh --seed

/*For any route problems*/
php artisan optimize

/*For view problems*/
php artisan view:cache
php artisan view:clear

````

- Admin mail:  admin@admin
- Passwords for admin and all users:  password
- After login, you will be redirected to the blog home page and the nav bar will contain a dropdown link with sub links (dashboard link and logout link)






