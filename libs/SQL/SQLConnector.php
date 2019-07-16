<?php

require_once '../../config.php';

class SQLConnector {

    private static $_pdo;

    /**
     * Renvoi le PDO
     * @return PDO
     */
    public static function getPDO() {
        if (isset(self::$_pdo)) {
            return self::$_pdo;
        } else {
            $connector = new SQLConnector();
            return $connector->getConnector();
        }
    }

    public function __construct() {
        try {
            self::$_pdo = new PDO("mysql:host=" . DB_HOST . ";port=3306;dbname=" . DB_NAME . "", DB_USERNAME, DB_PASSWORD);
            self::$_pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function getConnector() {
        return self::$_pdo;
    }

}
