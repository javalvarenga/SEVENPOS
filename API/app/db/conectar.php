<?php
class Database {
    private $host = 'sevenpos.c9pbfyeukwau.us-east-2.rds.amazonaws.com';
    private $username = 'Jeremy';
    private $password = 'Jeremy2024.';
    private $database = 'SevenPOS';
    private $connection;

    // Método para conectar a la base de datos
    public function connect() {
        $this->connection = new mysqli($this->host, $this->username, $this->password, $this->database);

        if ($this->connection->connect_error) {
            die("Error de conexión (" . $this->connection->connect_error . "): " . $this->connection->connect_error);
        }

        return $this->connection;
    }

    // Método para desconectar de la base de datos
    public function disconnect() {
        if ($this->connection) {
            $this->connection->close();
        }
    }
}
?>
