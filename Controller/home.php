<?php
    //simple example of a controller
    
    /*include("Model/User.php");
    $email = 'jdoe@gmail.com';
    $password = 'qwerty';
    $query = $bdd -> prepare('SELECT password FROM User WHERE email = :email ');
    $query -> bindValue(':email',$email);
    $query -> execute();
    $verifPassword = $query -> fetch();
    
    if($password == $verifPassword["password"]){
        $query = $bdd -> prepare('SELECT id FROM User WHERE email = :email and password = :password');
        $query -> bindValue(':email',$email);
        $query -> bindValue(':password',$password);
        $query -> execute();
        $id = $query -> fetch();
        $user1 = new User($id["id"]);
       // var_dump($user1);*/
        include("View/home.php");
    /*}
    else{
        echo "error wrong password or email";
    }*/
    
    

?>