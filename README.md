

## Mockup News Platform

This project is a mockup news platform inspired by local news outlet [Južne Vesti](https://www.juznevesti.com/).

To set up the project in local environment clone the repository and follow typical steps for setting up a Laravel project. [For general instructions check here](https://devmarketer.io/learn/setup-laravel-project-cloned-github-com/).

In order to get a proper path for sample images, create folder **public** in *storage/app* and copy the folder **images** from *storage/images* to *storage/app/public*.

After that, run `php artisan storage:link` command in the terminal.

Database migration will generate categories, towns, fake news articles, comments and users. Also, an admin user will be generated. To login as admin use admin@mail.com and password *password!*.

Users can post, delete and edit their own comments. Admin can create, edit and delete all articles and comments.

