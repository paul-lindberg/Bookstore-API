<?php
//Post.php
// Author: Paul Lindberg
// 12/19/2022
// Responsible for CRUD database interactions

class Book {
    //db stuff
    private $conn;
    private $table = 'books';
    //post properties
    public $id;
    public $name;

    // connect to the database

    /**
     * @param PDO $db
     */
    public function __construct($db)
    {
        $this->conn = $db;
    }

    //get all posts from the database.

    /**
     * @return PDOStatement
     */
    public function read() {
        //create query
        $query = 'SELECT
            p.id,
            p.name
            FROM
            ' . $this->table . ' p';
        //prepare statement
        $stmt = $this->conn->prepare($query);
        //execute statement
        $stmt->execute();
        //fetch

        return $stmt;
    }

    //get a single post from the database. Apply post data to variables.

    /**
     * @return PDOStatement
     */
    public function read_single(): PDOStatement
    {
        //query
        $query = 'SELECT
            p.id,
            p.name
            FROM ' . $this->table . ' p
            WHERE p.id = :id';
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam('id', $this->id);
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        $this->id = $row['id'];
        $this->name = $row['name'];

        return $stmt;
    }

    /**
     * Create a post in the database
     * @return bool
     */
    public function create() {
        //query
        $query = 'INSERT INTO ' . $this->table . ' SET name = :name';
        $stmt = $this->conn->prepare($query);
        $this->name = htmlspecialchars(strip_tags($this->name));
        $stmt->bindParam(':name', $this->name);
        if ($stmt->execute()){
            return true;
        }
        printf("Error %s. \n", $stmt->error);
        return false;
    }

    /**
     * Update a post in the database
     * @return bool
     */
    public function update() {
        //query
        $query = 'UPDATE ' . $this->table . '
            SET name = :name
            WHERE id = :id';
        $stmt = $this->conn->prepare($query);
        $this->name = htmlspecialchars(strip_tags($this->name));
        $this->id = htmlspecialchars(strip_tags($this->id));
        $stmt->bindParam(':name', $this->name);
        $stmt->bindParam(':id', $this->id);
        if ($stmt->execute()){
            return true;
        }
        printf("Error %s. \n", $stmt->errorCode());
        return false;
    }

    /**
     * remove a post from the database
     * @return bool
     */
    public function delete() {
        //query
        $query = 'DELETE FROM ' . $this->table . ' WHERE id = :id';
        $stmt = $this->conn->prepare($query);
        $this->id = htmlspecialchars(strip_tags($this->id));
        $stmt->bindParam(':id', $this->id);
        if ($stmt->execute()) {
            return true;
        }
        printf("Error %s. \n", $stmt->errorCode());
        return false;
    }
}