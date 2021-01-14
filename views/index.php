<?php
date_default_timezone_set('UTC');
$departDay = 1;
$departMonth = 1;
switch (substr($_SERVER['REQUEST_URI'], -4)) {
    case "2020":
        $departYear = 2020;
        break;
    case "2019":
        $departYear = 2019;
        break;
    
    default:
        $departYear = 2019;
        break;
}
$date  = mktime(0, 0, 0, $departMonth, $departDay, $departYear);
$week  = (int)date('W', $date);
if((string)date('l', $date)!=="Monday")$week+=1;
?>

<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

    <title>Mini Galerie</title>
</head>
<body>
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
    <!-- <form action="" method="get"> -->
    <select id="year-select" name="year" >
    <option value="2019"<?php if (substr($_SERVER['REQUEST_URI'], -4) == 2019) {
       echo 'selected="selected"';
    } ?>  >2019</option>
        <option value="2020" <?php if (substr($_SERVER['REQUEST_URI'], -4)== 2020) {
          
           echo 'selected="selected"';
        } ?> >2020</option>
    </select>
    <!-- <input type="submit" value="GO"> -->
    <!-- </form> -->
</h1>
</div>

  <div class="planning-container container d-flex justify-content-center flex-row flex-wrap mx-5 my-3">
  
<div class="row">
<?php


for ($i=$week; $i <= 53; $i++) { 
    $date = new DateTime();
    $date->setISODate($departYear,$i);
    // echo $date->format('l'); 
    echo "<div class='semaine d-flex justify-content-around flex-row flex-wrap border py-2  col-md-3 col-6 '>";
    echo "<div class='semaine-date py-2 '>";
    echo $date->format('d/m/y');
    echo "</div>";
    echo "<div class='semaine-select py-2'>";
    echo '<select id="',$date->format('d/m/y'),'" name="names">
    <option value="personne">personne</option>
    <option value="vincent">vincent</option>
    <option value="david">david</option>
    <option value="christophe">christophe</option></select>';
    echo "</div>";
    echo "</div>";
    }
?>
</div>





  </div>