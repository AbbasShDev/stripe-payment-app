<?php

$mysqli = new mysqli(
    'localhost',
    'root',
    '',
    'Stripe-Payment-App'
);

$stat = $mysqli->prepare("");
$stat->bind_param('s', $id );
$stat->bind_param('s', $firstname);
$stat->bind_param('s', $lastname);
$stat->bind_param('s', $email);

$id = 'kjaklkla';
$firstname = 'ahhmed';
$lastname = 'alahmedahhmed';
$email = 'ahhmed@gmail.com';

$stat->execute();
