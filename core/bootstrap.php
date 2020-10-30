<?php

use App\Core\App;
use App\Core\Database\DB;
use App\Core\Database\Query;

ini_set('display_errors', 1);
error_reporting(E_ALL);

App::bind('config', require 'config.php');

App::bind('db', new Query(
    DB::connect(App::get('config')['database'])
));

$query = App::get('db');
