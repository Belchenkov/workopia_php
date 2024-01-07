<?php

namespace App\Controllers;

use Exception;
use Framework\Database;

class UserController
{
    protected Database $db;

    /**
     * @throws Exception
     */
    public function __construct()
    {
        $config = require basePath('config/db.php');
        $this->db = new Database($config);
    }

    /**
     * Show the login page
     *
     * @return void
     */
    public function login(): void
    {
        loadView('users/login');
    }

    /**
     * Show the register page
     *
     * @return void
     */
    public function create(): void
    {
        loadView('users/create');
    }
}
