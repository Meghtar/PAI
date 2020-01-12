<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <link rel="Stylesheet" type="text/css" href="../Public/css/style.css" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>Board</title>
    <meta name="viewport" content="initial-scale=1, maximum-scale=1">
    <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.3.1.min.js"></script>
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
                                Title
                            </div>
                            <div class="post_place">
                                place
                            </div>
                        </div>
                        <div class="post_tags">
                            <div class="post_tag"></div>
                        </div>
                    </div>
                    <div class="post_middle">
                        Proper text
                    </div>
                    <div class="post_bottom">
                        <div class="post_social"> buttons </div>
                        <div class="post_more"></div>
                    </div>
                </div>
            </div>
            <div class="post">
                <div class="post_picture"><img src="../Public/img/bus_placeholder_post_graphics.png"></img></div>
                <div class="post_content">
                    <div class="post_text">
                        Lorem ipsum
                    </div>
                </div>
            </div>
            <div class="post">
                <div class="post_picture"><img src="../Public/img/bus_placeholder_post_graphics.png"></img></div>
                <div class="post_content">
                    <div class="post_text">
                        Lorem ipsum
                    </div>
                </div>
            </div>
            <div class="post">
                <div class="post_picture"><img src="../Public/img/bus_placeholder_post_graphics.png"></img></div>
                <div class="post_content">
                    <div class="post_text">
                        Lorem ipsum
                    </div>
                </div>
            </div>
            <div class="post">
                <div class="post_picture"><img src="../Public/img/bus_placeholder_post_graphics.png"></img></div>
                <div class="post_content">
                    <div class="post_text">
                        Lorem ipsum
                    </div>
                </div>
            </div>
            <div class="post">
                <div class="post_picture"><img src="../Public/img/bus_placeholder_post_graphics.png"></img></div>
                <div class="post_content">
                    <div class="post_text">
                        Lorem ipsum
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>