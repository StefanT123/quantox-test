<?php

namespace App\Core\Database;

use PDO;

interface Connectable
{
    /**
     * Make a connection to the database.
     *
     * @param  array $config
     * @return PDO
     */
    public static function connect(array $config): PDO;
}
