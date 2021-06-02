<?php 
    if(session_id() == "") {
        session_start();
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link href="style/sass/style.css" rel="stylesheet">

        <style>
            @import url('https://fonts.googleapis.com/css2?family=Caveat:wght@400;500;600;700&display=swap');   
        </style> 
    </head> 
    
    <body>
        <?php 
            include('accounts.php'); 

            if(isset($_SESSION['pseudo'])) {
                include('admin-interface.php');
            }
        ?>

    </body>

    <script src="js/admin_interface.js"></script>
    <script src="js/admin_actions.js"></script>


</html>