<?php 
    //Borrowed from the internet, timeout session
    //Get the time from the server and then set how long it should take before user is logged out
    $time = $_SERVER['REQUEST_TIME'];
    $timeout_duration = 1800;
    //check if LAST_ACTIVITY exist, and if the time has 'passed'
    if (isset($_SESSION['LAST_ACTIVITY']) && 
        ($time - $_SESSION['LAST_ACTIVITY']) > $timeout_duration) 
        {
            //if it exist + expired -> remove session, destroy it and redirect to index with msg
            session_unset();
            session_destroy();
            header('Location: /index.php?message=logged out for inactivity');
        }
        //sets activity, makes it so that it should update too and not be 'hardcoded x min'
    $_SESSION['LAST_ACTIVITY'] = $time;
?>