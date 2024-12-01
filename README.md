# About project
All work was done using "Wamp.net", if you are using "Docker" or "Herd", then these notes may not help you.
This project was created with these versions: MySQL 8.2.0, PHP 8.3.1, Nginx 1.25.3, Node.js 20.14.0

Some elements of the project are not finished, such as:
    - Email verification
    - Password reset
    - The settings section, where there should be different options for customizing your environment
    - Ability to change profile image


# Important 
## Database
Before attempting to run the project, you must first download some files and create a database structure.
Creating the data structure (I worked using PhpMyAdmin):
    1.	Create a new database named 'lerner' . Go to SQL queries and enter this:
        `CREATE USER 'lerner '@'%' IDENTIFIED by 'lerner';
        GRANT USAGE ON *.* TO 'lerner'@'%';
        CREATE DATABASE IF NOT EXISTS lerner ;
        GRANT ALL PRIVILEGES ON lerner.* TO 'lerner'@'%';`

## File Restore 
Restoring missing files (You will need to continue working in the console. The location must match the location of the project):
    1.	First you need to create an .env file, to do this enter in the console:
            cp .env.example .env
    	Then we open the ".env"  file and find the fragment:
            `DB_CONNECTION= sqlite
            # DB_HOST=127.0.0.1
            # DB_PORT=3306
            # DB_DATABASE= laravel
            # DB_USERNAME=root
            # DB_PASSWORD=`
    	And change it to:
            `DB_CONNECTION= mysql
            DB_HOST=127.0.0.1
            DB_PORT=3306
            DB_DATABASE= lerner
            DB_USERNAME= lerner
            DB_PASSWORD= lerner`
    2.	Enter the command "composer install" to create the "vendor" folder
    3.	Enter the command "php artisan key:generate" into the console
    4.	Enter the command "npm install" into the console to create "node_module" folder
    5.	Enter the command "php artisan migrate:refresh --seed" into the console
    6.	The last thing you need to enter in the console is "npm run dev"
