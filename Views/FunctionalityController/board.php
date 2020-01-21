<?php
if(!isset($_SESSION['email']))
{
    $url = "http://$_SERVER[HTTP_HOST]/";
    header("Location: {$url}?page=error");
    return;
}

require_once __DIR__.'/../../Repository/LocationRepository.php';
require_once __DIR__.'/../../Repository/CityRepository.php';
require_once __DIR__.'/../../Repository/ReactionRepository.php';

$locationRepository = new LocationRepository();
$cityRepository = new CityRepository();
$reactionRepository = new ReactionRepository();
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
    <script src="../../Public/js/reactions.js"></script>
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
        <div class="posts">
        <?php //var_dump($posts); ?>
            <?php foreach($posts as $post): ?>
                <div class="post">
                    <div class="post_picture"><img src="<?= $post->getPicture();?>"/></div>
                    <div class="post_content">
                        <div class="post_upper">
                            <div class="post_title_and_place">
                                <div class="post_title">
                                    <?= $post->getTitle();?>
                                </div>
                                <div class="post_place">
                                    <?php
                                        echo $locationRepository->getLocationNameById($post->getLocalization()); 
                                        echo ', ';
                                        echo $cityRepository->getCityNameById($post->getCity());
                                    ?>
                                </div>
                            </div>
                        </div>
                        <div class="post_middle">
                        <?= $post->getContent();?>
                        </div>
                        <div class="post_social">
                            <img src="../Public/img/Yes.svg" onClick="like(<?= $post->getId(); ?>);"> <span id="likes<?= $post->getId();?>"><?= $reactionRepository->getPostLikes($post->getId());?> </span></img>
                            <img src="../Public/img/No.svg" onClick="dislike(<?= $post->getId(); ?>);"> <span id="dislikes<?= $post->getId();?>"><?= $reactionRepository->getPostDislikes($post->getId());?> </span> </img>
                            <img src="../Public/img/comment-alt-solid.svg"> <?= $post->getCommentsAmount();?> </img>
                            <img src="../Public/img/share-alt-square-solid.svg"> <?= $post->getShares();?> </img>
                        </div>
                    </div>
                </div>
            <?php endforeach ?>
        </div>
        <!--<div class="post_add">
            <a href="/?page=add_post"><i class="far fa-plus-square"></i></a>
        </div>-->
    </div>
</div>
</body>
</html>