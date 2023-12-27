<?php
namespace App\Controllers;

use Framework\Database;

class HomeController
{
    protected Database $db;

    /**
     * @throws \Exception
     */
    public function __construct()
    {
        $config = require basePath('config/db.php');
        $this->db = new Database($config);
    }

    /*
     * Show the latest listings
     *
     * @return void
     */
    public function index(): void
    {
        $listings = $this->db->query('SELECT * FROM listings LIMIT 6')->fetchAll();

        loadView('home', [
            'listings' => $listings
        ]);
    }
}
