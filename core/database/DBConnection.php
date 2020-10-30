<?php

namespace App\Core\Database;

use PDO;

class DB implements Connectable
{
    /**
     * Make a connection to the database.
     *
     * @param  array $config
     * @return PDO
     */
    public static function connect(array $config): PDO
    {
        try {
            return new PDO(
                $config['connection'] . ';dbname=' . $config['name'],
                $config['username'],
                $config['password'],
                $config['options']
            );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
}
