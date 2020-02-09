# PP_client

Application developed in symfony 5

## Instructions ⚙️

1. Composer install & Change the database connection in the .env file
2. Create the database: php bin/console doctrine:database:create
3. Create the tables in the database: php bin/console doctrine:schema:update --force
4. starts to use it

## Description

The application has 3 buttons, the first one "call api order" brings an order and adds it to the database.
The second button "call api search order" brings several orders and adds them to the database.
The third button "list orders" shows a list of orders with their details.

* Note: Remember to put the index.php in the main path of the application.
