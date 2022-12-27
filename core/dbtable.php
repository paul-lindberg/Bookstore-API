<?php

abstract class dbtable {
    protected $conn;
    private $table;


    /**
     * @param PDO $db
     */
    public function __construct(PDO $db)
    {
        $this->conn = $db;
    }

    /**
     * get all posts from the database.
     * @return PDOStatement
     */
    abstract protected function read(): PDOStatement;

    /**
     * get a single post from the database. Apply post data to variables.
     * @return PDOStatement
     */
    abstract protected function read_single(): PDOStatement;

    /**
     * Create a post in the database
     * @return bool
     */
    abstract protected function create(): bool;

    /**
     * Update a post in the database
     * @return bool
     */
    abstract protected function update(): bool;

    /**
     * remove a post from the database
     * @return bool
     */
    abstract protected function delete(): bool;

}