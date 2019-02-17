# web Appetiser exam

#
#please set up the laravel app on your web root folder with the directory name 'appetiser_exam_laravel', the vue app will be using this endpoint('http://localhost/appetiser_exam_laravel/public/api/') for the api calls
#

# setting up the laravel app

#>composer update

#>php artisan key:generate

#define database connection in the .env file

#>php artisan migrate

#>php artisan db:seed --class=PassersTableSeeder
