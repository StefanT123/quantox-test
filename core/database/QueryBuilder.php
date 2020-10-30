<?php

namespace App\Core\Database;

use PDO;

class QueryBuilder
{
    /**
     * Object of PDO class.
     *
     * @var PDO
     */
    protected $db;

    /**
     * Initialize this class with PDO object.
     *
     * @param PDO $pdo
     */
    public function __construct(PDO $db)
    {
        $this->db = $db;
    }

    /**
     * Get everything from the specified table.
     *
     * @param  string $table
     * @return array
     */
    public function getAll($table)
    {
        $statement = $this->db->prepare("SELECT * FROM {$table}");

        $statement->execute();

        return $statement->fetchAll(PDO::FETCH_CLASS);
    }

    /**
     * Insert new record in DB.
     *
     * @param  string $table
     * @param  array  $parameters
     * @return void
     */
    public function insert(string $table, array $parameters)
    {
        $sql = sprintf(
            'insert into %s (%s) values (%s)',
            $table,
            implode(', ', array_keys($parameters)),
            ':' . implode(', :', array_keys($parameters))
        );

        $this->executePreparedSql($sql, $parameters);
    }

    /**
     * Execute the prepared SQL statement.
     *
     * @param  string $sql
     * @param  array  $parameters
     * @return void
     *
     * @throws \PDOException
     */
    protected function executePreparedSql(string $sql, array $parameters)
    {
        try {
            $statement = $this->pdo->prepare($sql);
            $statement->execute($parameters);
        } catch (\PDOException $e) {
            die($e->getMessage());
        }
    }
}
