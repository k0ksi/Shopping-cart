<?php

define('DEFAULT_CONTROLLER', 'home');
define('DEFAULT_ACTION', 'index');
define('DEFAULT_LAYOUT', 'default');

define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'cart');

define('DEFAULT_PAGE_NUMBER', 0);
define('DEFAULT_PAGE_SIZE', 10);

define('INVALID_USERNAME', "Username is invalid!
                Your name must be at least 5 characters long.");
define('INVALID_PASSWORD', "Password is invalid!
                Your password must be at least 5 characters long.");
define('REGISTRATION_SUCCESS', "Successful registration!");
define('REGISTRATION_FAILURE', "Registration failed!");
define('LOGIN_SUCCESS', "Logged in successfully!");
define('LOGIN_ERROR', "Login error!");
define('BYE_MESSAGE', 'Bye! See you soon!');

define('CATEGORY_VALIDATION_ERROR', 'The category name should be at least 5 characters long.');
define('CATEGORY_CREATED', "Category created.");
define('CATEGORY_CREATION_ERROR', "Error creating category.");
define('CATEGORY_DELETED', "Category deleted.");
define('CATEGORY_NOT_DELETED', "Cannot delete category.");
define('LOGIN_FIRST', 'Please login first!');
define('DB_CONNECTION_ERROR', 'Cannot connect to database');
define('PRODUCT_VALIDATION_ERROR', 'The product name should be at least 5 characters long.');
define('PRODUCT_CREATED', 'Product created.');
define('PRODUCT_CREATION_ERROR', 'Error creating product.');
define('INVALID_CATEGORY', 'No such category exists.');