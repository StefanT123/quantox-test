<?php

namespace App\Repositories;

use App\Core\App;
use App\Models\Model;

abstract class Repository
{
    protected $model;
    protected $query;
    protected $table;

    protected function __construct(Model $model)
    {
        $this->model = $model;
        $this->query = App::get('db');
        $this->table = $model->getTable();
    }

    public static function for(Model $model)
    {
        return new static($model);
    }

    public function all(string $fields = '*')
    {
        return $this->query->all($this->table, $fields);
    }

    public function find(string $fields = '*')
    {
        return $this->query->find($this->table, $this->model->id, $fields);
    }

    public function withRelation(string $relation)
    {
        try {
            $this->query->join(
                $this->table,
                $relation,
                $this->model->getRelation($relation)
            );

            return $this;
        } catch (\Exception $e) {
            die($e->getMessage());
        }
    }

    public function insert(array $params)
    {
        $fillable = [];
        $pivots = $this->model->getPivots();

        foreach ($this->model->getFields() as $field) {
            if (array_key_exists($field, $params)) {
                $fillable[$field] = $params[$field];
            }
        }

        return $this->query->insert($this->table, $fillable);
    }
}
