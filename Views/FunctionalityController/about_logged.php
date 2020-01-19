<?php
if(!isset($_SESSION['email']))
{
    $url = "http://$_SERVER[HTTP_HOST]/";
    header("Location: {$url}?page=error");
    return;
}
?>
<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <link rel="Stylesheet" type="text/css" href="../Public/css/style.css" />
    <link rel="Stylesheet" type="text/css" href="../Public/css/board.css" />
    <link rel="Stylesheet" type="text/css" href="../Public/css/functional.css" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>Board</title>
    <meta name="viewport" content="initial-scale=1, maximum-scale=1">
    <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.3.1.min.js"></script>
    <script src="https://kit.fontawesome.com/447f7e44ae.js" crossorigin="anonymous"></script>
    <!--<script src="../Public/js/scroll.js"></script>-->
</head>
<body>
<div class="functional">
    <?php // TODO: after clicking menu button more info should appear (js)
        include(dirname(__DIR__).'/Common/navbar.php');
    ?>
    <div class="mainpart">
        <?php
            include(dirname(__DIR__).'/Common/logofunc.php');
        ?>
        <div class="plane"> <!-- TODO: change name and do CSS stuff -->
            aaa
        </div>
    </div>
</div>
</body>
</html>