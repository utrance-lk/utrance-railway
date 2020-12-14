<?php

class Database {

    public $pdo;

    public function __construct($config) {

        $dsn = $config['dsn'] ?? '';
        $user = $config['user'] ?? '';
        $password = $config['password'] ?? '';

        $this->pdo = new PDO($dsn, $user, $password);
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // throw an exception incase there is an error
    }
    
    // public function applyMigrations() {
    //     $this->createMigrationsTable();
    //     $this->getAppliedMigrations();

    //     $files = scandir(App::$ROOT_DIR.'/migrations'); 
    //     var_dump($files);
    //     exit;

    // }

    // public function createMigrationsTable() {
    //     $this->pdo->exec("CREATE TABLE IF NOT EXISTS migrations(
    //         id INT AUTO_INCREMENT PRIMARY_KEY,
    //         migration VARCHAR(255),
    //         created_at TIMESTAMP_DEFAULT_CURRENT_TIMESTAMP
    //     ) ENGINE=INNODB;");
    // }

    // public function getAppliedMigraions() {
    //     $statement = $this->pdo->prepare("SELECT migration FROM migrations");
    //     $statement->execute();

    //     return $statement->fetchAll(PDO::FETCH_COLUMN);
    // }

}