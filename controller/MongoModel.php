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
            // $this->manager =new MongoDB\Driver\Manager('mongodb+srv://dbUserTest:test@cluster0.lfm81.mongodb.net/test?retryWrites=true&w=majority');
            $this->manager =new MongoDB\Driver\Manager('mongodb+srv://' . DB_USER . ':' . DB_PASSWORD . '@' . DB_URI . '/test?retryWrites=true&w=majority');
        } catch (MongoDB\Driver\Exception\Exception $e) {
            echo $e->getMessage();
        }
    }

    public function getConnection($filter, $options): ?Cursor
    {
        $query  = new MongoDB\Driver\Query($filter, $options);
        try {
            return $this->manager->executeQuery($this->collection, $query);
        } catch (\MongoDB\Driver\Exception\Exception $e) {
            echo $e->getMessage();
        }
        return null;
    }
    public function getCollection(): string
    {
        return $this->collection;
    }
    public function getAll($filter, $options){
        return $result =  $this->getConnection($filter,[]);
    }
    public function getOne($filter, $need){
         $result =  $this->getConnection($filter,[])->$need;
        //  $result = $result->$need;
         return $result;
        
    }
}