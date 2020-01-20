<?php
require_once 'AppController.php';
require_once __DIR__.'/../Models/User.php';
require_once __DIR__.'/../Repository/UserRepository.php';

class SecurityController extends AppController {
    public function login()
    {
        if(isset($_SESSION['email']))
        {
            $url = "http://$_SERVER[HTTP_HOST]/";
            header("Location: {$url}?page=board");
            return;
        }
        $userRepository = new UserRepository();

        if ($this->isPost()) {
            $email = $_POST['email'];
            $password = $_POST['password'];

            $user = $userRepository->getUserByEmail($email);

            if (!$user) {
                $this->render('login', ['messages' => ['User with this email not exist!']]);
                return;
            }

            if (!password_verify($password, $user->getPassword())) {
                $this->render('login', ['messages' => ['Wrong password!']]);
                return;
            }

            $_SESSION["email"] = $user->getEmail();

            $url = "http://$_SERVER[HTTP_HOST]/";
            header("Location: {$url}?page=board");
            return;
        }
        $this->render('login');
    }
    public function register()
    {
        if(isset($_SESSION['email']))
        {
            $url = "http://$_SERVER[HTTP_HOST]/";
            header("Location: {$url}?page=board");
            return;
        }
        $userRepository = new UserRepository();

        if ($this->isPost()) {
            $email = $_POST['email'];
            $name = $_POST['name'];
            $password = $_POST['password'];
            $repeated_password = $_POST['repeated_password'];

            if(strlen($password) < 5) {// TODO: make more restrictions
                $this->render('register', ['messages' => ['Password is too weak!']]);
                return;
            }

            if($password !== $repeated_password) {
                $this->render('register', ['messages' => ['Passwords don\'t match!']]);
                return;
            }

            $user = $userRepository->getUserByEmail($email);

            if ($user) {
                $this->render('register', ['messages' => ['User with this email already exists!']]);
                return;
            }

            $user = $userRepository->getUserByName($name);

            if ($user) {
                $this->render('register', ['messages' => ['User with this name already exists!']]);
                return;
            }

            $user = $userRepository->addUser($email, $name, password_hash($password, PASSWORD_DEFAULT));

            $this->render('login', ['messages' => ['You can log in now!']]);
            return;
        }
        $this->render('register');
    }
    public function reset()
    {
        $this->render('reset');
    }
    public function logout()
    {
        session_unset();
        session_destroy();

        $this->render('login', ['messages' => ['You have been successfully logged out!']]);
    }
}
?>