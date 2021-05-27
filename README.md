# Companies-Customers relationship  manager (CRUD) application

## About application

 This app is built with Laravel framework. With this project manager app you can create, read, update and delete customers and companies. You can filter customers by company.

## Deployment procedure:

1. Clone this git repository or download and extract ZIP folder
2. Move folder to this directory C:\Program Files\Ampps\www
3. Start Apache and MySQL using Ampps
4. Create new Schema 'companies' in your database
5. Go to '.env.example' file and configure Database
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=companies
   DB_USERNAME=root
   DB_PASSWORD=mysql

    Note: DB_DATABASE should be the same as schema's name that you created in 5th step

6. Rename '.env.example' file to '.env'
7. This app requires you to have **Composer** and **Doctrine** installed:
    - Install [Composer](https://getcomposer.org/download/) (install it locally in `\www` directory)
    - Go to the downloaded app folder and run this command in terminal `php ../composer.phar install`
    - To install **Doctrine** run this command in terminal `php composer.phar require doctrine/orm`
8. Run command in terminal `php artisan key:generate`
9. Run command in terminal `php artisan migrate` to create tables in 
Once you apen the app in your browser, login will be required.

**Log in information:**  
email: admin@admin.com
Password: adminadmin

## Authors

[Jolita](https://github.com/SunshinePro/)
