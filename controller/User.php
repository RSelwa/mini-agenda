<?php

class User extends MongoModel {
    public function __construct(){
        //test si $_session existe
    }
    
public function compareAgenda(){
    //recupere les données deja existante
    //compare les données par rapport aux données deja existante puis renvoie les données a modifier
}
public function modifyAgenda($db){
    //requette mongo pour modifier les data
}


public function render($mongoSemaines,$mongoUsers){
    $this->mongoSemaines = $mongoSemaines;
    $this->mongoUsers = $mongoUsers;
    $year = 2020;
    include('views/user.php');
}
}

