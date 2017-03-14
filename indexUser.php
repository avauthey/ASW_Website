<!DOCTYPE html>
<html>
<?php
// https://asw-website-avauthey.c9users.io
// A simple web site in Cloud9 that runs through Apache
// Press the 'Run' button on the top to start the web server,
// then click the URL that is emitted to the Output tab of the console

// Include the file to connect the project with the database


// Creation of a new session user
session_start();
if(isset($_SESSION["id"])){
    include('connectDB.php');
    include('Model/User.php');
    // creation of new object user which is the user connected
    $user = new User($_SESSION["id"]);
    // Include the file header
    include("View/header.html");
   // echo $user -> getFirstName();
    /*if ($user -> getHasPaid() == 0){
        echo " You don't have paid bastard!";
    }*/
    
    ?>
    
    
     
     
    <body>
        <?php
        // Include the menu bar
        include("View/menuBarUser.html");
        // Condition to the MVC
        if (!empty($_GET['page']) && is_file('Controller/'.$_GET['page'].'.php'))
        {
            // Include the controller of the page asked by the user
            /* Ex: if the user wants to go on the page 
                * https://asw-website-avauthey.c9users.io/index.php?page=home
                * it will include the controller home.php
            */
            include 'Controller/'.$_GET['page'].'.php';
        }
        else
        {
            // if the user wants to go on a page that doesn't exist it will display the index page 
           //include 'Controller/homeUser.php';
           echo "create the home page user";
          // echo '<input type="text" name="name" id="name" class="form-control" placeholder="name" value="'.$user->getFirstName().'">';
        }
    ?>
    </body>
    
    <?php
    
    // Include the footer
    include("View/footer.php");
}
else{
    echo "Your are not allow in this section";
}
?>
</html>