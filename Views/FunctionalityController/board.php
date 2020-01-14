<?php
if(!isset($_SESSION['id']))
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
        <div class="posts">
            <div class="post">
                <div class="post_picture"><img src="../Public/img/bus_placeholder_post_graphics.png"></img></div>
                <div class="post_content">
                    <div class="post_upper">
                        <div class="post_title_and_place">
                            <div class="post_title">
                                Example car accident
                            </div>
                            <div class="post_place">
                                Ul. Przykładowa 1, Kraków
                            </div>
                        </div>
                        <div class="post_tags">
                            <div class="post_tag">jam</div>
                            <div class="post_tag">car crash</div>
                            <div class="post_tag">accident</div>
                        </div>
                    </div>
                    <div class="post_middle">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed vel arcu nulla. Curabitur egestas faucibus nunc, id luctus massa mattis at. Morbi euismod tellus at arcu lobortis scelerisque. Sed at aliquet nisl. Integer eros purus, fringilla a lectus at, sollicitudin dapibus metus. Nunc vel consequat lorem, ut pulvinar arcu. 
                    </div>
                    <div class="post_social">
                        <img src="../Public/img/Yes.svg"> 11 </img>
                        <img src="../Public/img/No.svg"> 22 </img>
                        <img src="../Public/img/comment-alt-solid.svg"> 33 </img>
                        <img src="../Public/img/share-alt-square-solid.svg"> 44 </img>
                    </div>
                </div>
            </div>
            <div class="post">
                <div class="post_picture"><img src="../Public/img/bus_placeholder_post_graphics.png"></img></div>
                <div class="post_content">
                    <div class="post_upper">
                        <div class="post_title_and_place">
                            <div class="post_title">
                                Example car accident
                            </div>
                            <div class="post_place">
                                Ul. Przykładowa 1, Kraków
                            </div>
                        </div>
                        <div class="post_tags">
                            <div class="post_tag">jam</div>
                            <div class="post_tag">car crash</div>
                            <div class="post_tag">accident</div>
                        </div>
                    </div>
                    <div class="post_middle">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed vel arcu nulla. Curabitur egestas faucibus nunc, id luctus massa mattis at. Morbi euismod tellus at arcu lobortis scelerisque. Sed at aliquet nisl. Integer eros purus, fringilla a lectus at, sollicitudin dapibus metus. Nunc vel consequat lorem, ut pulvinar arcu. 
                    </div>
                    <div class="post_social">
                        <img src="../Public/img/Yes.svg"> 11 </img>
                        <img src="../Public/img/No.svg"> 22 </img>
                        <img src="../Public/img/comment-alt-solid.svg"> 33 </img>
                        <img src="../Public/img/share-alt-square-solid.svg"> 44 </img>
                    </div>
                </div>
            </div>
            <div class="post">
                <div class="post_picture"><img src="../Public/img/bus_placeholder_post_graphics.png"></img></div>
                <div class="post_content">
                    <div class="post_upper">
                        <div class="post_title_and_place">
                            <div class="post_title">
                                Example car accident
                            </div>
                            <div class="post_place">
                                Ul. Przykładowa 1, Kraków
                            </div>
                        </div>
                        <div class="post_tags">
                            <div class="post_tag">jam</div>
                            <div class="post_tag">car crash</div>
                            <div class="post_tag">accident</div>
                        </div>
                    </div>
                    <div class="post_middle">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed vel arcu nulla. Curabitur egestas faucibus nunc, id luctus massa mattis at. Morbi euismod tellus at arcu lobortis scelerisque. Sed at aliquet nisl. Integer eros purus, fringilla a lectus at, sollicitudin dapibus metus. Nunc vel consequat lorem, ut pulvinar arcu. 
                    </div>
                    <div class="post_social">
                        <img src="../Public/img/Yes.svg"> 11 </img>
                        <img src="../Public/img/No.svg"> 22 </img>
                        <img src="../Public/img/comment-alt-solid.svg"> 33 </img>
                        <img src="../Public/img/share-alt-square-solid.svg"> 44 </img>
                    </div>
                </div>
            </div>
            <div class="post">
                <div class="post_picture"><img src="../Public/img/bus_placeholder_post_graphics.png"></img></div>
                <div class="post_content">
                    <div class="post_upper">
                        <div class="post_title_and_place">
                            <div class="post_title">
                                Example car accident
                            </div>
                            <div class="post_place">
                                Ul. Przykładowa 1, Kraków
                            </div>
                        </div>
                        <div class="post_tags">
                            <div class="post_tag">jam</div>
                            <div class="post_tag">car crash</div>
                            <div class="post_tag">accident</div>
                        </div>
                    </div>
                    <div class="post_middle">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed vel arcu nulla. Curabitur egestas faucibus nunc, id luctus massa mattis at. Morbi euismod tellus at arcu lobortis scelerisque. Sed at aliquet nisl. Integer eros purus, fringilla a lectus at, sollicitudin dapibus metus. Nunc vel consequat lorem, ut pulvinar arcu. 
                    </div>
                    <div class="post_social">
                        <img src="../Public/img/Yes.svg"> 11 </img>
                        <img src="../Public/img/No.svg"> 22 </img>
                        <img src="../Public/img/comment-alt-solid.svg"> 33 </img>
                        <img src="../Public/img/share-alt-square-solid.svg"> 44 </img>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</div>
</body>
</html> <!-- TODO: not responsive yet -->