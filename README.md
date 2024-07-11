Two-week individual assignment during first year education.
Simple Laravel webshop

--------------------------------------------------------------------------------------------------------------

Welcome to Sinus Websop

For installation, please follow the instructions below
(PHP, Composer and XAMPP are expected to be already installed)

1. Download the .zip file from GitHub
2. Unzip and place the program folder in desired directory
3. Open the program in, for example, VS Code
4. Open a terminal window, ensure that you are in the correct project folder
5. Run "composer install" in terminal window
6. Copy .env.example and save as .env
7. Open the .env file and enter a name for your database eg -> DB_DATABASE = "YOUR DATABASE", save and close
8. Open the config/database.php file: 
(1) Enter the same name for your database eg 'database' => env('DB_DATABASE', 'YOUR_DATABASE')
(2) Enter your database username eg 'username' => env('DB_USERNAME', 'root')
(3.) Save and close
9. Create a new database with the name used in 5 and 6. For example, use phpMyAdmin.
10. In terminal, run "php artisan migrate:fresh --seed" to create and seed database (or reset)
11. In terminal, run "php artisan serve" to start your server/environment
12. Open projekt in browser and click refresh to generate new app key (will automatically be saved in .env)


Suggestions to start exploring Sinus webshop (you can always reset the database by repeating step 10 above)
1. There are two prepared accounts: 
(1) admin (email: admin@sinus.se, password: admin)
(2) user (email: user@sinus.se, password: user)
2. Search/filter and Create new product: 
(1) There are no red products in added to the database, but three images available
(1.1) sinus-cap-red.png
(1.2) sinus-hoodie-red.png
(1.3) sinus-wheel-red.png
3. Edit product: 
(1) The pink t-shirt (product id 10) has no image added
(1.1) sinus-t-shirt-pink.png
4. Visibility: 
(1) Scateboard plastic (product id 19) is not visible in the webshop, but included in admins product list (is_accessible = 0)
(1.1) sinus-scateboard-plastic.png
