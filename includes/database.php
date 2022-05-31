<?php
    /* Connecting to the database. */
    $conn = mysqli_connect(
        'localhost',
        'root',     
        '',    
        'dfs'  
        
       /* // online
        'localhost',
        'motacom_mota',
        'Mota00.',
        'motacom_dfs'*/
    );

    /* This is checking if the connection is set. If it is not set, it will echo "Not Connected". */
    if (!isset($conn)) {
       echo "Not Connected";
    }

    /* Setting the variable `` to false. */
    $act = false;
?>


