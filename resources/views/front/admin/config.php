<?php

global $connection;

define( 'HOSTNAME' , 'localhost' );
define( 'USERNAME' , 'admin' );
define( 'PASSWORD' , 'notime11!!' );
define( 'DATABASE' , 'pfaceesl_paypal' );

$connection = new mysqli( HOSTNAME, USERNAME, PASSWORD, DATABASE );
?>
