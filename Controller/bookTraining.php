 <?php
    global $bdd;
    $query = $bdd -> prepare('select id from Training where date >= :today order by date ');
    $query -> bindValue(':today',date('Y-m-d'));
   	$query -> execute();
    $data2 = $query -> fetchAll();
        
    include('Model/Training.php');
    include("View/bookTraining.php");
    
?>