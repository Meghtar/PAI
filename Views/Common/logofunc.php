<div class="logofunc">
    <a href="/">
        <div class="logo">
            Traffic<img src="../Public/img/placeholder.svg">City
        </div>
    </a>
    <?php
    if(!isset($_SESSION['email']))
    {
        $url = "http://$_SERVER[HTTP_HOST]/";
        header("Location: {$url}?page=error");
        return;
    }
    require_once __DIR__.'/../../Repository/UserRepository.php';

    $userRepository = new UserRepository();
    if($userRepository->getUserByEmail($_SESSION['email'])->getRole() === 1)
    {
        echo "<a href=\"?page=admin\">
                <i class=\"fas fa-user-shield\"></i>
            </a>";
    }
    ?>
    <a href="?page=logout">
        <i class="fas fa-sign-out-alt"></i>
    </a>
</div>