<html>
    <head>

        <!-- Compiled and minified CSS -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css">

        <!-- Compiled and minified JavaScript -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>

    </head>
    
    <body>
        
        <ul class="collection">
            <?php foreach($user_list as $user){ ?>
                <li class="collection-item"><?php echo $user['fname']?></li>
            <?php } ?>
          </ul>
        
    </body>
</html>