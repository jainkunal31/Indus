<?php
/* Database connection settings */
$host = 'localhost';
$user = 'root';
$pass = 'kunal@123';
$db = 'kunal';
$mysqli = new mysqli($host,$user,$pass,$db) or die($mysqli->error);
