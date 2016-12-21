<!DOCTYPE html>
<html>
    <head>
        <title><?=$title?></title>
        <link rel="stylesheet" type="text/css" href="/css/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="/css/style.css">
    </head>
    <body>
        <?php include 'app/views/viewHeader.php'; ?>
        <?php include 'app/views/'.$content;?>
        <?php include 'app/views/viewFooter.php'?>
    </body>
</html>