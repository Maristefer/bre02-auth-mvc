<?php
/**
 * @author : Gaellan
 * @link : https://github.com/Gaellan
 */

$passwords = [
    "test",
    "admin",
    "password",
    "s3CureP@ssw0rd",
    "bingo",
];

foreach($passwords as $password)
{
    $hash = password_hash($password, PASSWORD_BCRYPT);
    echo "$password : $hash <br>";
}