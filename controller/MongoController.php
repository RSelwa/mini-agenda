<?php

use MongoDB\Driver\Cursor;


/**
 * Class MongoController
 */
class MongoController
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

    /**
     * Read the database
     * @param $filter
     * @param $option
     * @return Cursor|null
     */
    public function requestData($filter, $option): ?Cursor
    {
        $read = new MongoDB\Driver\Query($filter, $option);
        try {
            return $this->manager->executeQuery($this->collection, $read);
        } catch (\MongoDB\Driver\Exception\Exception $e) {
            echo $e->getMessage();
        }
        return null;
    }

    /**
     * Insert Data in Collection
     * @param $data
     */
    public function insertData($data)
    {
        $insertData = new MongoDB\Driver\BulkWrite();
        $insertData->insert($data);
        $this->manager->executeBulkWrite($this->collection, $insertData);
    }

    public function setCollection($collection)
    {
        $this->collection = $collection;
    }

    /**
     * @return string
     */
    public function getCollection(): string
    {
        return $this->collection;
    }
}