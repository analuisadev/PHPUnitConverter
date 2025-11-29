<?php

namespace Model;

require_once __DIR__ . '/../Config/configuration.php';

use PDO;
use PDOException;

class Connection
{
    private static $stmt;

    public static function getConnection(): PDO
    {
        if (self::$stmt) {
            try {
                self::$stmt = new PDO('mysql:host=' . DB_HOST . ';port=' . DB_PORT . ';dbname=' . DB_NAME . '', DB_USER, DB_PASSWORD);
            } catch (PDOException $error) {
                die('Erro de conexão: ' . $error->getMessage());
            }
        }
        return self::$stmt;
    }
}