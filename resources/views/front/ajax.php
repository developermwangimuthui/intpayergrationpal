<?php
session_start();

$firstname          = ucwords($_POST['first_name']);
$lastname           = ucwords($_POST['last_name']);
$email_address      = $_POST['email_address'];
$services           = ucwords($_POST['services']);
$amount             = $_POST['enter_amount'];
$amount_type        = $_POST['currency_type'];
$getways            = 'Paypal';

$_SESSION['firstname']          = $firstname;
$_SESSION['lastname']           = $lastname;
$_SESSION['email_address']      = $email_address;
$_SESSION['services']           = $services;
$_SESSION['amount']             = $amount;
$_SESSION['amount_type']        = $amount_type;
$_SESSION['getways']            = $getways;
?>