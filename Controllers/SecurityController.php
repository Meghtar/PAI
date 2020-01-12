<?php
require_once 'AppController.php';
require_once __DIR__.'/../Models/User.php';
require_once __DIR__.'/../Repository/UserRepository.php';

class SecurityController extends AppController {
    public function login()
    {
        //var_dump($_POST);
        $userRepository = new UserRepository();

        if ($this->isPost()) {
            $email = $_POST['email'];
            $password = $_POST['password'];

            $user = $userRepository->getUserByEmail($email);

            if (!$user) {
                $this->render('login', ['messages' => ['User with this email not exist!']]);
                return;
            }

            if ($user->getPassword() !== $password) {
                $this->render('login', ['messages' => ['Wrong password!']]);
                return;
            }

            $_SESSION["id"] = $user->getEmail();

            $url = "http://$_SERVER[HTTP_HOST]/";
            header("Location: {$url}?page=board");
            return;
        }
        $this->render('login');
    }
    public function register()
    {
        $userRepository = new UserRepository();

        if ($this->isPost()) {
            $email = $_POST['email'];
            $name = $_POST['name'];
            $password = $_POST['password'];
            $repeated_password = $_POST['repeated_password'];

            if(strlen($password) < 1) {// TODO: make more restrictions 
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

            $user = $userRepository->addUser($email, $name, $password);

            $this->render('login', ['messages' => ['You can log in now!']]);
            return;
        }
        $this->render('register');
    }
    public function reset()
    {
        $this->render('reset');
    }
}
?>