<!DOCTYPE html>
<html>
<?php
// https://asw-website-avauthey.c9users.io
// A simple web site in Cloud9 that runs through Apache
// Press the 'Run' button on the top to start the web server,
// then click the URL that is emitted to the Output tab of the console

// Include the file to connect the project with the database
include('connectDB.php');

// Creation of a new session user
$id=(isset($_SESSION['id']))?(int) $_SESSION['id']:0;
if ($id!=0) erreur('error');
session_start();



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
       include 'Controller/home.php';
    }
?>
</body>

<?php

// Include the footer
include("View/footer.php");

?>
</html>