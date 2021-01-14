<?php 

require_once "./variables.php";

switch ($_SERVER['REQUEST_URI']) {
    case '/mini-agenda/user.php':
        echo 'user';
        //require "./controller/userController"
    break;
    
    default:
    echo $_SERVER['REQUEST_URI'];
    //require "./controller/Controller"
        break;
}

// include('views/index.php');
?>
