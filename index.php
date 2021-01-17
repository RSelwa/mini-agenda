<?php 
require_once "./variables.php";
require_once 'views/header.php';
require "./controller/MongoModel.php";
$mongoSemaines = new MongoModel("agendaEpluchage.semaines");
$mongoUsers = new MongoModel("agendaEpluchage.users");

// $test =  $mongoTest->getConnection(['year'=>2020],[]);
// foreach($test as $r){
//    print_r($r->week);
//  }
switch ($_SERVER['REQUEST_URI']) {
    case '/mini-agenda/user.php':
        require "./controller/User.php";
        $agenda = new User();
        $agenda->render($mongoSemaines,$mongoUsers);

    break;
    
    default:
    require "./controller/Agenda.php";
    $agenda = new Agenda();
    $agenda->render($mongoSemaines,$mongoUsers);
        break;
}

// include('views/index.php');
?>
