<?php

namespace App\Repositories;

use App\Core\App;
use App\Models\SchoolBoard;

class SchoolBoardRepository
{
    protected $schoolBoard;
    protected $query;
    protected $table;

    public function __construct(SchoolBoard $schoolBoard)
    {
        $this->schoolBoard = $schoolBoard;
        $this->query = App::get('db');
        $this->table = $schoolBoard->getTable();
    }

    public function all(string $fields = '*')
    {
        return $this->query->all($this->table, $fields);
    }
}
