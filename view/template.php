<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="../../style/variables.css" rel="stylesheet">
        <link href="../../style/title.css" rel="stylesheet">
        <link href="../../style/accounts.css" rel="stylesheet">
        <style>
            @import url('https://fonts.googleapis.com/css2?family=Caveat:wght@400;500;600;700&display=swap');   
        </style> 

        <link href="./../style/sass/style.css" rel="stylesheet">

        <title>PORTFOLIO</title>
    </head>

    <body>
        
        <?php include('parts/header.php'); ?>
        <!-- <hr> -->

            <main>
                <?php 
                    $img_folder_url = 'http://localhost/FORM_PROJETS/form_projet4_Portfolio_v2/static/img/';

                    echo '<a class="ancre" id="ancre-1"></a>' . '<br>';
                    include('parts/about.php');
                    echo '<hr>';

                    echo '<a class="ancre" id="ancre-2"></a>' . '<br>';
                    include('parts/php/article-projects.php');
                    echo '<hr>';

                    echo '<a class="ancre" id="ancre-3"></a>' . '<br>';
                    include('parts/contacts.php');
                    echo '<hr>';
                ?>

            </main>


        <hr>
        <?php include('parts/footer.php'); ?>
        
        <!-- <script src="./scripts/effects.js"></script>
        <script src="./scripts/events.js"></script>
        <script src="./scripts/admin_interface.js"></script> -->

        <script src="../js/script.js"></script>
        <script src="../js/accounts.js"></script>
    </body>

</html>