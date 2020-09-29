<?php

include_once( 'admin/config.php' );
global $connection;

$users = "CREATE TABLE IF NOT EXISTS user_details(
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
firstname varchar(255) DEFAULT '' NOT NULL,
lastname varchar(255) DEFAULT '' NOT NULL,
email varchar(255) DEFAULT '' NOT NULL,
services varchar(255) DEFAULT '' NOT NULL,
amount varchar(255) DEFAULT '' NOT NULL,
amount_type varchar(255) DEFAULT '' NOT NULL,
getways varchar(255) DEFAULT '' NOT NULL,
payment_status longtext DEFAULT '' NOT NULL,
transaction longtext DEFAULT '' NOT NULL,
user_status longtext DEFAULT '' NOT NULL
)";

$services = "CREATE TABLE IF NOT EXISTS services(
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
services varchar(255) DEFAULT '' NOT NULL
)";

$admin = "CREATE TABLE IF NOT EXISTS admin(
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
user_name varchar(255) DEFAULT '' NOT NULL,
password varchar(255) DEFAULT '' NOT NULL
)";

$settings = "CREATE TABLE IF NOT EXISTS meta(
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
sandbox varchar(255) DEFAULT '' NOT NULL,
paypal varchar(255) DEFAULT '' NOT NULL
)";

$connection->query($settings);
$connection->query($admin);
$connection->query($users);
$connection->query($services);


function get_service_list(){
    global $connection;
    $connection = new mysqli( HOSTNAME, USERNAME, PASSWORD, DATABASE );
    $sql_query = "SELECT * FROM services";
    $services = $connection->query($sql_query);
    
    if ( $services->num_rows > 0) {
        while( $service = $services->fetch_assoc()){
            $service_name = $service['services'];
            echo "<option value='$service_name'>$service_name</option>";
        }
    }
}

function paypal_url(){
    global $connection;
    $connection = new mysqli( HOSTNAME, USERNAME, PASSWORD, DATABASE );
    $sql_query = "SELECT * FROM meta";
    $settings = $connection->query($sql_query);
    
    if ($settings->num_rows > 0) {
        while( $setting = $settings->fetch_assoc()) {
            $sandbox = $setting['sandbox'];
        }
    }
    
    if( $sandbox == 'on' ){
        $url = 'https://www.sandbox.paypal.com/cgi-bin/webscr';
    }else{
        $url = 'https://www.paypal.com/cgi-bin/webscr';
    }
    echo $url;
}

function paypal_email(){
    global $connection;
    $connection = new mysqli( HOSTNAME, USERNAME, PASSWORD, DATABASE );
    $sql_query = "SELECT * FROM meta";
    $settings = $connection->query($sql_query);
    
    if ($settings->num_rows > 0) {
        while( $setting = $settings->fetch_assoc()) {
            $paypal = $setting['paypal'];
        }
    }
    echo $paypal;
}

$connection->close();
?>