<?php

namespace MDH\Blog\Core\Database;

class PDOFactory
{
    public static ?\PDO $pdo = null;
    public static function getPDO(array $settings): \PDO
    {
        if (self::$pdo === null) {
            try {
                $dsn = "{$settings['driver']}:host={$settings['host']};dbname={$settings['name']}";
                self::$pdo = new \PDO($dsn, $settings['user'], $settings['password']);
            }catch (\PDOException $exception) {

            }
        }
        return self::$pdo;
    }
}