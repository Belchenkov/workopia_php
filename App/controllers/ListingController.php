<?php

namespace App\Controllers;

use Framework\Database;

class ListingController
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
    * Show all listings
    *
    * @return void
    */
    public function index(): void
    {
        $listings = $this->db->query('SELECT * FROM listings')->fetchAll();

        loadView('home', [
            'listings' => $listings
        ]);
    }

    /*
     * Show the create listing form
     *
     * @return void
     */
    public function create(): void
    {
        loadView('listings/create');
    }

    /*
     * Show a single listing
     *
     * @return void
    */
    public function show(): void
    {
        $id = $_GET['id'] ?? '';

        $params = [
            'id' => $id
        ];

        $listing = $this->db->query('SELECT * FROM listings WHERE id = :id', $params)->fetch();

        loadView('listings/show', [
            'listing' => $listing
        ]);
    }
}
