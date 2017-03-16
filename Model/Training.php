<?php
    //include the file with database
    if(file_exists('connectionDB.php'))
        include 'connectionDB.php';
    else if(file_exists('../connectionDB.php'))
    	include '../connectionDB.php';
    	
    //class Training
    class Training{
        
        //attributs
        private $id;
        private $name;
        private $nbPlace;
        private $date;
        private $duration;
        private $type;
        
        //constructor
        function __construct($idParam){
			global $bdd;
			$query = $bdd -> prepare('SELECT * FROM Training WHERE id = :id');
		    $query -> bindValue(':id',$idParam, PDO::PARAM_INT);
		    $query -> execute();
		    $data = $query -> fetch();
		    $this -> id = $data['id'];
		    $this -> name = $data['name'];
		    $this -> nbPlace = $data['nbPlace'];
		    $this -> date = $data['date'];
		    $this -> duration = $data['duration'];
		    $this -> type = $data['type'];
		}
		
		//methods
		function getId(){
			return $this -> id;
		}
		function getName(){
			return $this -> name;
		}
		function getNbpPlace(){
			return $this -> nbPlace;
		}
		function getDate(){
			return $this -> date;
		}
		function getDuration(){
			return $this -> duration;
		}
		function getType(){
			return $this -> type;
		}
}

?>