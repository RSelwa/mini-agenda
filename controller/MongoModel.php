<?php

use MongoDB\Driver\Cursor;

class MongoModel
{
    private $manager;
    private $collection;

    public function __construct($collection)
    {
        $this->collection = $collection;
        try {
            $this->manager = new MongoDB\Driver\Manager("mongodb+srv://" . DB_USER . ":" . DB_PASSWORD . "@" . DB_URI . "/test?retryWrites=true&w=majority");
        } catch (MongoDB\Driver\Exception\Exception $e) {
            echo $e->getMessage();
        }
    }

    public function getConnection(){

    }
}


dbUserTest    test


cluster0.lfm81.mongodb.net/<dbname>?retryWrites=true&w=majority