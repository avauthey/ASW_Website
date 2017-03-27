 <?php
/**
 * Created by Chris
 * Modified by Chris the 14/03/17
 */
    
    global $bdd;
    $query = $bdd -> prepare('SELECT * from Booking where idUser=:idUser order by idTraining');
    $query -> bindValue(':idUser',$user -> getId());
    $query -> execute();
    $data = $query -> fetchAll();
    $array=array();
    foreach($data as $booking) {
        $idTraining=$booking['idTraining'];
        $query = $bdd -> prepare('SELECT * from Training where id=:idTraining');
        $query -> bindValue(':idTraining',$idTraining);
        $query -> execute();
        $data2 = $query -> fetch();
        $array[]=$data2;
    }
    
    include('Model/Training.php');
    include("View/myBooking.php");
    
?>