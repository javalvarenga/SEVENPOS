<?php
class Database
{
    private $host = 'sevenpos.c9pbfyeukwau.us-east-2.rds.amazonaws.com';
    private $user = 'Kevin';
    private $password = 'Kevin2024.';
    private $database = 'sevePOS';

    public function getConnection()
    {
        $hostDB = "mysql:host=" . $this->host . ";dbname=" . $this->database . ";";

        try {
            $connection = new PDO($hostDB, $this->user, $this->password);
            $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $connection;
        } catch (PDOException $e) {
            die("ERROR: " . $e->getMessage());
        }
    }
}
