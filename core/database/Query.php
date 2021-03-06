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
     * SQL string.
     *
     * @var string
     */
    protected $sql = '';

    /**
     * SQL string for join.
     *
     * @var string
     */
    protected $joinSql = '';

    /**
     * SQL string for where.
     *
     * @var string
     */
    protected $whereSql = '';

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
     * Set query for getting everything from a table.
     *
     * @param  string $table
     * @return \App\Core\Database\Query
     */
    public function all(string $table, string $fields = '*')
    {
        $this->sql .= "SELECT {$fields} FROM {$table} ";

        return $this;
    }

    public function find(string $table, int $id, string $fields = '*')
    {
        $this->sql .= "SELECT {$fields} FROM {$table} WHERE id = :id";

        return $this;
    }

    /**
     * Join two tables based on some condition.
     *
     * @param  string $table1
     * @param  string $table2
     * @param  string $fk
     * @return \App\Core\Database\Query
     */
    public function join(string $table1, string $table2, string $fk)
    {
        $this->joinSql .= "JOIN {$table2} ON {$table1}.{$fk} = {$table2}.id ";

        return $this;
    }

    /**
     * Fetch all data based on the given query.
     *
     * @param  array  $params
     * @return array
     */
    public function get(array $params = [])
    {
        $sql = $this->setQuery();
        $stmt = $this->execute($sql, $params);

        $this->resetQueries();

        return $stmt->fetchAll();
    }

    /**
     * Fetch data based on the given query.
     *
     * @param  array  $params
     * @return object
     */
    public function getOne(array $params = [])
    {
        $sql = $this->setQuery();
        $stmt = $this->execute($sql, $params);

        $this->resetQueries();

        return $stmt->fetch();
    }

    /**
     * Insert new record in DB.
     *
     * @param  string $table
     * @param  array  $parameters
     * @return bool
     */
    public function insert(string $table, array $parameters)
    {
        $sql = sprintf(
            'insert into %s (%s) values (%s)',
            $table,
            implode(', ', array_keys($parameters)),
            ':' . implode(', :', array_keys($parameters))
        );

        return $this->execute($sql, $parameters);
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

    /**
     * Set sql query.
     *
     * @return string
     */
    protected function setQuery()
    {
        $sql = $this->sql;
        $sql .= $this->joinSql;
        $sql .= $this->whereSql;

        return $sql;
    }

    /**
     * Reset query fields.
     *
     * @return void
     */
    protected function resetQueries()
    {
        $this->sql = '';
        $this->joinSql = '';
        $this->whereSql = '';
    }
}
