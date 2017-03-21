 <?php
    global $bdd;
    $query = $bdd -> prepare('select id from Training order by date');
	$query -> execute();
    $data2 = $query -> fetchAll();
        
    include('Model/Training.php');
    include("View/bookTraining.php");
    
?>