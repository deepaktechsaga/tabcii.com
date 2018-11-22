<?php
//enable errors
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

//session start
@session_start();

// db connection params
$servername = "localhost";
$username   = "root";
$password   = "R@hul1234567$"; //R@hul1234567$
$dbname     = "tabcii_bus";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
