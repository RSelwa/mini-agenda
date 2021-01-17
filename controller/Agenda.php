<?php

class Agenda extends MongoModel 
{
    private $mongoSemaines;
    private $mongoUsers;
    public function __construct(){
        //get all db return l'agenda + $is_connected = false

    }
    public function render($mongoSemaines,$mongoUsers){
        $this->mongoSemaines = $mongoSemaines;
        $this->mongoUsers = $mongoUsers;
        $year = 2020;
        include('views/index.php');
        //require ./view/agenda.php
    }
    // render();
}
