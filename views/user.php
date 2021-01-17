<?php
date_default_timezone_set('UTC');
if(isset($_POST["action"]) && $_POST["action"] === "year") {
    $year = (int)$_POST['year'];
}
if(isset($_POST["action"]) && $_POST["action"] === "week") {
    // $year = (int)$_POST['year'];
    echo $year;
    if ($year == 2019) {
        echo "ca marche";
        foreach($mongoSemaines->getAll(['year'=>$year],[]) as $r){
            $weekString = strval( $r->week );
            $yearString = strval( $year);
            echo $_POST[$r->week .''. $year];
            $bulk = new MongoDB\Driver\BulkWrite;
            $bulk->update(
            ['year' => $year],
            ['week' => $r->week],
            ['$set' => ['idPersonne' => 3]]
    );
    
    // $mongoSemaines = new MongoDB\Driver\Manager('mongodb://localhost:27017');
    // $mongoSemaines = new MongoModel("agendaEpluchage.semaines");
    $result = $mongoSemaines->executeBulkWrite('agendaEpluchage.semaines', $bulk);
        }
    }else {
        $year =2020;
        foreach($mongoSemaines->getAll(['year'=>$year],[]) as $r){
            $weekString = strval( $r->week );
            $yearString = strval( $year);
            echo $_POST[$r->week .''. $year];
        }
    }
    // echo $_POST["12020"];
    // echo "test";
    }
$departDay = 1;
$departMonth = 1;

$date  = mktime(0, 0, 0, $departMonth, $departDay, $year);
$week  = (int)date('W', $date);
if((string)date('l', $date)!=="Monday")$week+=1;
  
?>

<nav class="d-flex align-items-center justify-content-between px-5 py-3 bg-primary text-light">
<h5 class="fw-normal">Planning de patates</h5>
<div  class="d-flex align-items-center">
    <div class="px-3 py-1 bg-red rounded border border-2 border-dark bg-dark mx-3 shadow "> <a href="" class="text-reset text-decoration-none"> SE CONNECTER</a> </div>
    <div class="px-3 py-1 bg-red rounded border border-2 border-white mx-3  "><a href="" class="text-reset text-decoration-none"  > S'INSCRIRE</a></div>
</div>
</nav>
<div class="d-flex justify-content-center p-3">
<h1>    
    Année
    <form action="" method="post">
    <input type="hidden" name="action" value="year"/>
    <select id="year-select" name="year" >
        <option value="2019">2019</option>
        <option value="2020">2020</option>
    </select>
    <button type="submit">Submit</button>
</form>
</h1>
</div>
  <div class="planning-container container d-flex justify-content-center flex-row flex-wrap mx-5 my-3">
  
<form action="" method="post">
<input type="hidden" name="action" value="week" />

<div class="row">
<?php

    foreach($mongoSemaines->getAll(['year'=>$year],[]) as $r){
      
    $date = new DateTime();
    $date->setISODate($year,$r->week);
    echo "<div class='semaine d-flex justify-content-around flex-row flex-wrap border py-2  col-md-3 col-6 '>";
    echo "<div class='semaine-date py-2 '>";
    echo $date->format('d/m/y');
    echo "</div>";
    echo "<div class='semaine-select py-2'>";
    echo '<select id="',$r->week,$year,'" name="',$r->week,$year,'">';
    // echo '<select id="',$date->format('d/m/y'),'" name="names">';:
    echo "<option value=''>Personne</option>";
    foreach($mongoUsers->getAll([],[]) as $r){
    echo "<option value=",$r->name,">",$r->name,"</option>";
   
}
    echo "</select>";
    echo "</div>";
    echo "</div>";
    }
?>
<button type="submit">Update</button>
</div>
</form>





  </div>