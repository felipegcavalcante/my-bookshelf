<?php

    define("DB_HOST", "127.0.0.1");
    define("DB_PORT", "3306");
    define("DB_NAME", "my_bookshelf");
    define("DB_USER", "root");
    define("DB_PASSWORD", "");
    // define("DB_PASSWORD", "r007@my5ql");
    define("DB_DSN", sprintf("mysql:host=%s;port=%s;dbname=%s", DB_HOST, DB_PORT, DB_NAME));
?>