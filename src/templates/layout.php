<!--Core of View in MVC-->
<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>CameraMatch</title>
        <link rel="stylesheet" href="/CameraMatch/public/css/style.css" type="text/css">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" type="image/png" href="/CameraMatch/public/img/favicon-32x32.png">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" 
        integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" 
        crossorigin="anonymous" referrerpolicy="no-referrer">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin> 
        <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    </head>
    <body>
        <?php
        require "src/templates/header.php";
        if (isset($template) && file_exists('src/templates/'.$template.'.php')){
            require $template.'.php';
        }
        ?>
        <div>
            <a href="#" class="to-top"><i class="fa-solid fa-chevron-up"></i></a>
        </div>
        <script src="/CameraMatch/public/js/script.js"></script>
    </body>
</html>