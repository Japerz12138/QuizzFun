<?php
/* Database credentials.
Modify this to match your host, user, password, and database name
 */
const DB_SERVER = 'localhost';
const DB_USERNAME = '';
const DB_PASSWORD = '';
const DB_NAME = 'quiz_bank';

function getConnection()
{
    /* Attempt to connect to MySQL database */
    try {
        $pdo = new PDO("mysql:host=" . DB_SERVER . ";dbname=" . DB_NAME, DB_USERNAME, DB_PASSWORD);
        // Set the PDO error mode to exception
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $pdo;
    } catch (PDOException $e) {
        die("ERROR: Could not connect. " . $e->getMessage());
    }
}
?>