<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <link rel="Stylesheet" type="text/css" href="../Public/css/style.css" />
    <link rel="Stylesheet" type="text/css" href="../Public/css/main.css" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>TrafficOCity</title>
    <meta name="viewport" content="initial-scale=1, maximum-scale=1">
</head>
<body>
<div class="container">
    <?php
        include(dirname(__DIR__).'/logopart.php');
    ?>
    <div class="split panel">
        <div class="inputpanel">
            <form action="/?page=login" method="POST">
                <input name="email" type="text" placeholder="email@email.com" id="email-input" autocomplete="off">
                <input name="password" type="password" placeholder="Input password" id="password-input" autocomplete="off">
                <button type="submit" class="btn btn-primary">LOGIN</button>
            </form>
        </div>
        <div class="messages">
            <?php
                if(isset($messages)){
                    foreach($messages as $message) {
                        echo $message;
                    }
                }
            ?>
        </div>
        <div class="have-account">
            <a href="/?page=reset">Cannot access your account?</a>
        </div>
        <div class="social">
            <a href=""><img src="../Public/img/Facebook.svg"></a>
            <a href=""><img src="../Public/img/Twitter.svg"></a>
            <a href=""><img src="../Public/img/Google plus.svg"></a>
        </div>
    </div>
    <div class="midline"></div>
</div>
</body>
</html>