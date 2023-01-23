<?php

//Create a Class

class Post{
    //db information
    private $conn;
    private $table = 'posts';

    //Post Properties
    public $id;
    public $category_id;
    public $category_name;
    public $title;
    public $body;
    public $author;
    public $create_at;

    //Constructor with DB connection
    public function __construct($db){
        $this->conn = $db;
    }
    //Getting posts from the database
    public function read(){
        //Create query of the read function
        $query = 'SELECT
            c.name as acategory_name,
            p.id,
            p.category_id,
            p.title,
            p.body,
            p.author,
            p.created_at
            FROM 
            ' .$this-> table . 'p
            LEFT JOIN
                categories c ON p.category_id = c.id
                ORDER BY p.created_at DESC';
       //Prepare the statement
       $stmt = $this ->conn->prepare($query);
       //Execute query
       $stmt->execute();
       
       return $stmt;

    }
}
