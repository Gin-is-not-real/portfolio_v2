<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
                    // $img_folder_url = 'http://localhost/FOLDERS/FORM_PROJETS/form_projet4_Portfolio_v2/static/img/';
                    $img_folder_url = '../static/img/';

                    echo '<div class="container-ancre" ><a class="ancre" id="ancre-1"></a></div>' . '<br>';
                    include('parts/about.php');
                    echo '<hr>';

                    echo '<div class="container-ancre"><a class="ancre" id="ancre-2"></a></div>' . '<br>';
                    include('parts/php/article-projects.php');
                    echo '<hr>';

                    echo '<div class="container-ancre"><a class="ancre" id="ancre-3"></a></div>' . '<br>';
                    include('parts/contacts.php');
                    echo '<hr>';
                ?>

            </main>


        <hr>
        <?php include('parts/footer.php'); ?>
    </body>

</html>