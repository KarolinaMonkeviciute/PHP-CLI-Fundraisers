<?php

namespace App\Controllers;

use App\Base\Database;

class CommonController
{
    protected $database;
    public function __construct()
    {
        $this->database = new Database();
    }
}