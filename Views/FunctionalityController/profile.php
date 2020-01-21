<?php
if(!isset($_SESSION['email']))
{
    $url = "http://$_SERVER[HTTP_HOST]/";
    header("Location: {$url}?page=error");
    return;
}
require_once __DIR__.'/../../Repository/UserRepository.php';
require_once __DIR__.'/../../Repository/ReactionRepository.php';

$userRepository = new UserRepository();
$reactionRepository = new ReactionRepository();

$user = $userRepository->getUserByEmail($_SESSION['email']);
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
        <div class="plane">
        <h1>Profile</h1>
        <h3>
        <?php
            echo $user->getName();
        ?>
        </h3>
        <h3>
        <?php
            echo $user->getEmail();
        ?>
        </h3>
        <h3><br></h3>
        <h2>Statistics</h2>
        <h4>
        Total marks:
        <img src="../Public/img/Yes.svg"><?= $reactionRepository->getUserLikes($user->getId());?></img>
        <img src="../Public/img/No.svg"><?= $reactionRepository->getUserDislikes($user->getId());?></img>
        </h4>
        <h4>
        Average:
        <i class="fas fa-chart-bar"></i> 0.5
        </h4>
        <h4>
        Last post:
        <i class="far fa-calendar-alt"></i> 2 days ago
        </h4>
        </div>
    </div>
</div>
</body>
</html>