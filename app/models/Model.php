<?php

namespace App\Models;

abstract class Model
{
    protected $table = '';

    protected $fields = [];

    protected $relations = [];

    /**
     * Get table name for model.
     *
     * @return string
     */
    public function getTable()
    {
        return $this->table;
    }

    /**
     * Get models table fields.
     *
     * @return array
     */
    public function getFields()
    {
        return $this->fields;
    }

    /**
     * Get relation for model
     *
     * @param  string $key
     * @return string
     */
    public function getRelation(string $key)
    {
        if (! array_key_exists($key, $this->relations)) {
            throw new \Exception("No such relation");
        }

        return $this->relations[$key];
    }
}
