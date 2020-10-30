<?php

namespace App\Core\Database;

use PDO;

class Query
{
    /**
     * Object of PDO class.
     *
     * @var PDO
     */
    protected $pdo;

    /**
     * Initialize this class with PDO object.
     *
     * @param PDO $pdo
     */
    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
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

        $this->execute($sql, $parameters);
    }

    /**
     * Execute the prepared SQL statement.
     *
     * @param  string $sql
     * @param  array  $parameters
     * @return PDOStatement
     *
     * @throws \PDOException
     */
    public function execute(string $sql, array $parameters = [])
    {
        try {
            $statement = $this->pdo->prepare($sql);
            $statement->execute($parameters);

            return $statement;
        } catch (\PDOException $e) {
            die($e->getMessage());
        }
    }
}
