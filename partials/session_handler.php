<?php 
    require_once 'session_start.php';
    //Borrowed from the internet, timeout session
    //Get the time from the server and then set how long it should take before user is logged out
    $time = $_SERVER['REQUEST_TIME'];
    $timeout_duration = 1800;
    //check if a user in loggedin, else it will redirect to index
    //this is to make sure that unauthorized people trying to reach partial files directly through
    //their browser will not be able to do so. Not the best way, but it's something.
    //it could be in its own file - but since both need session and to not have 'extra' session I put them both here.
    if (!isset($_SESSION["loggedIn"]))
    {
        header('Location: ../index.php?message=not logged in');
    }
    else
    {
        //check if LAST_ACTIVITY exist, and if the time has 'passed'
        if (isset($_SESSION['LAST_ACTIVITY']) && 
            ($time - $_SESSION['LAST_ACTIVITY']) > $timeout_duration) 
            {
                //if it exist + expired -> remove session, destroy it and redirect to index with msg
                session_unset();
                session_destroy();
                header('Location: ../index.php?message=logged out for inactivity');
            }
            //sets activity, makes it so that it should update too and not be 'hardcoded x min'
        $_SESSION['LAST_ACTIVITY'] = $time;
    }
?>