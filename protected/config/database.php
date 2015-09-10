<?php

// This is the database connection configuration.
return array(
    //'connectionString' => 'sqlite:'.dirname(__FILE__).'/../data/testdrive.db',
    // uncomment the following lines to use a MySQL database

    'connectionString' => 'mysql:host=localhost;dbname=ishop',
    'emulatePrepare' => true,
    'username' => 'ishop',
    'password' => '127001',
    'charset' => 'utf8',
    'tablePrefix' => 'ishop_',
); 