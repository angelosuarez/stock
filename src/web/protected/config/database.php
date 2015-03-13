<?php

// This is the database connection configuration.
return array(
//	'connectionString' => 'sqlite:'.dirname(__FILE__).'/../data/testdrive.db',
	// uncomment the following lines to use a MySQL database
	/*
	'connectionString' => 'mysql:host=localhost;dbname=testdrive',
	'emulatePrepare' => true,
	'username' => 'root',
	'password' => '',
	'charset' => 'utf8',
	*/
    
                'connectionString'=>'pgsql:host=localhost;port=5432;dbname=vic_marcas',
                            'emulatePrepare'=>true,
                            'username'=>'postgres',
                            'password'=>'Ang123..-',
                            'charset'=>'utf8',
);
